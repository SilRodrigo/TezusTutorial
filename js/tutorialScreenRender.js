import Utils from './utils.js'
import StepCardFactory from "./stepCard/factory.js";
import TutorialFactory from "./tutorial/factory.js";

export default class TutorialScreenRender extends StepCardFactory {
    constructor(context, tutorialPath) {
        super();
        this.context = context;
        this.tutorialPath = tutorialPath;
        this.tutorial = {};
        this.loadSteps(tutorialPath);
    }

    async loadSteps(path) {
        let tutorial = await import(path);
        if (!tutorial) return;
        this.renderTutorial(tutorial.default)
    }

    renderTutorial(tutorial) {
        this.context.getElementById('tutorial_title').innerText = this.tutorial.title = tutorial.tutorial_title;
        this.context.getElementById('sub_title').innerText = this.tutorial.sub_title = tutorial.sub_title;
        this.context.getElementById('player').setAttribute('yt-link', tutorial.yt_link), this.tutorial.yt_link = tutorial.yt_link;
        this.tutorial.stepCards = this.renderStepsCard(this.context.getElementById('tutorial_steps'), tutorial.steps)
        this.listeners();
    }

    listeners() {
        document.querySelectorAll('[url-copy]').forEach(elem => {
            let lastChild = elem.lastChild,
                iconElem = document.createElement('i');
            iconElem.classList.add('ps-2', 'fa-regular', 'fa-copy');
            lastChild.append(iconElem);
            elem.addEventListener('click', event => { Utils.copyToClipBoard(elem.attributes['url-copy'].value); })
        });

        document.querySelectorAll('[yt-timestamp]').forEach(elem => {
            let timeStamp = elem.attributes['yt-timestamp'].value;
            elem.setAttribute('fancyTime', Utils.fancyTimeFormat(timeStamp))
            elem.addEventListener('click', event => { player.seekTo(elem.attributes['yt-timestamp'].value); })
        });

        document.addEventListener('scroll', () => {
            if (window.innerWidth < 768) return;
            const initial_scroll_validation = document.querySelector('.tutorial-steps-card').getClientRects()[0].y - document.body.getClientRects()[0].y,
                ytPlayer = document.querySelector('#player');
            if (window.pageYOffset < initial_scroll_validation) return ytPlayer.style.top = '';
            ytPlayer.style.top = `${window.pageYOffset - initial_scroll_validation}px`;
        })
    }
}

export class CreateStepCardRender extends StepCardFactory {
    constructor() {
        super();
    }

    editNewStepCard() {
        return this.generateStepCard();
    }

    processNewStep(edit_card, values) {
        if (values.removeCardEffect) return;
        if (values.copy_value) edit_card.attributes = { ...edit_card.attributes, 'url-copy': values.copy_value };
        if (values.a_link_value) edit_card.link = values.a_link_value;
        edit_card.text += `<${values.step_elem_type}>${values.elem_value}</${values.step_elem_type}>`;
    }
}

export class TutorialRender extends TutorialFactory {
    constructor() {
        super();
    }    

}