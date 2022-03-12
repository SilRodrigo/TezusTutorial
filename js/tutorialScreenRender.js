import Utils from './utils.js'
import StepCardFactory from "./stepCard/factory.js";
import TutorialFactory from "./tutorial/factory.js";

export default class TutorialScreenRender extends StepCardFactory {
    constructor(context, object) {
        super();
        this.context = context;
        this.tutorial = new TutorialRender().generateTutorial(object);
        this.renderTutorial();
    }

    renderTutorial() {
        this.context.getElementById('tutorial_title').innerText = this.tutorial.tutorial_title;
        this.context.getElementById('sub_title').innerText = this.tutorial.sub_title;
        this.context.getElementById('player').setAttribute('yt-link', this.tutorial.yt_link);
        this.renderStepsCard(this.context.getElementById('tutorial_steps'), this.tutorial.steps.get())
        this.listeners();
    }

    listeners() {
        document.querySelectorAll('[url-copy]').forEach(elem => {            
            elem.addEventListener('click', event => { Utils.copyToClipBoard(elem.attributes['url-copy'].value); })
        });

        document.querySelectorAll('[yt-timestamp]').forEach(elem => {
            let timeStamp = elem.attributes['yt-timestamp'].value;
            if (!timeStamp) return;
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

    addToStep(edit_card, values) {
        if (values.removeCardEffect) return;
        if (values.a_link_value) edit_card.link = values.a_link_value;
        edit_card.text += `<${values.step_elem_type}>${values.elem_value}</${values.step_elem_type}>`;
    }
}

export class TutorialRender extends TutorialFactory {
    constructor() {
        super();
    }
}

export class TutorialList {
    constructor(context, object, urlPath) {
        this.context = context;
        this.object = object;
        this.urlPath = urlPath;
        this.renderTutorialList(object)
    }

    renderTutorialList(list) {
        if (typeof list !== 'object') list = JSON.parse(list);

        list.forEach(tutorial => {
            let renderedCard = this.renderTutorialCard(tutorial),
                cardListTarget = this.context.getElementById('tutorial_list');
            cardListTarget.append(renderedCard);
        })
    }

    renderTutorialCard(data) {
        if (typeof data.content !== 'object') data.content = JSON.parse(data.content);

        let outer_div = this.context.createElement('div'),
            a = this.context.createElement('a'),
            card_div = this.context.createElement('div'),
            div_card_body = this.context.createElement('div'),
            inner_div = this.context.createElement('div');

        inner_div.classList.add('font-weight-bold', 'text-primary-custom');
        inner_div.innerText = data.content.tutorial_title;
        div_card_body.classList.add('card-body');
        div_card_body.append(inner_div);
        card_div.classList.add('shadow', 'card', 'border-left-primary', 'py-2');
        card_div.append(div_card_body);
        a.href = this.urlPath + '?tutorial_id=' + data.id;
        a.append(card_div);
        outer_div.classList.add('col-12', 'col-md-4', 'card-container');
        outer_div.append(a);

        return outer_div;
    }
}