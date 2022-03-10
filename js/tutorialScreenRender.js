import Utils from './utils.js'
import StepCardFactory from "./stepCard/factory.js";

export default class TutorialScreenRender extends StepCardFactory {
    constructor(context, tutorialPath) {
        super();
        this.context = context;
        this.tutorialPath = tutorialPath;
        this.tutorial_values = {};
        this.loadSteps(tutorialPath);
    }

    async loadSteps(path) {
        let tutorial = await import(path);
        if (!tutorial) return;
        this.renderTutorial(tutorial.default)
    }

    renderTutorial(tutorial) {
        this.context.getElementById('tutorial_title').innerText = this.tutorial_values.title = tutorial.tutorial_title;
        this.context.getElementById('sub_title').innerText = this.tutorial_values.sub_title = tutorial.sub_title;
        this.context.getElementById('player').setAttribute('yt-link', tutorial.yt_link), this.tutorial_values.yt_link = tutorial.yt_link;
        this.tutorial_values.stepCards = this.renderStepsCard(this.context.getElementById('tutorial_steps'), tutorial.steps)
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