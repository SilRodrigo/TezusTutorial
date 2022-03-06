export default class TutorialScreenRender {
    constructor(context, object) {
        this.context = context;
        this.loadSteps(object);
    }

    async loadSteps(object) {
        if (object) this.renderTutorial(object);
    }

    renderTutorial(tutorial) {
        this.context.getElementById('tutorial_title').innerText = tutorial.tutorial_title;
        this.context.getElementById('sub_title').innerText = tutorial.sub_title;
        this.context.getElementById('player').setAttribute('yt-link', tutorial.yt_link);
        tutorial.steps.forEach(step => { this.renderStepsCard(step) });
    }

    renderStepsCard(step) {
        let finalElem;

        if (!step.removeCardEffect) {
            let div_card = document.createElement('div'),
                div_card_body = document.createElement('div');

            div_card.classList.add('card', 'my-1');
            div_card.tabIndex = "-1";
            div_card_body.classList.add('card-body');
            for (const key in step.attributes) { div_card_body.setAttribute(key, step.attributes[key]); }
            this.prepareText(step.text, div_card_body, step.link);
            div_card.append(div_card_body);

            finalElem = div_card;
        } else {
            let outer_div = document.createElement('div'),
                inner_h3 = document.createElement('h3');
            this.prepareText(step.text, inner_h3, step.link);
            outer_div.classList.add('pt-3', 'px-2');
            outer_div.append(inner_h3);

            finalElem = outer_div;
        }

        this.context.getElementById('tutorial_steps').append(finalElem);
    }

    prepareText(text, parentElement, link) {
        /* /<[a-z]*?>.*?<\/[a-z]*?>/ Seleciona tags */
        /* /.*?(?=<[a-z]*?>|$)/ Seleciona tudo antes de uma tag */;
        let result;

        while (result = text.match(/(<[a-z]*?>.*?<\/[a-z]*?>)|(.*?(?=<[a-z]*?>|$))/)) {
            result = result[0];
            if (!result) break;
            try {
                text = text.replace(result, '');
                let tagElem = result.match(/(?<=<).*?(?=>)/) /* Seleciona só a tag */,
                    tagContent = result.match(/(?<=<[a-z]*?>)(.*?)(?=<\/[a-z]*?>)/) /* Seleciona tudo de dentro das tags */;
                tagElem = document.createElement(tagElem ? tagElem[0] : 'div');
                if (link) {
                    tagElem.href = link;
                    tagElem.target = '_blank';
                }
                tagElem.innerText = tagContent ? tagContent[0] : result;
                parentElement.append(tagElem);
            } catch (error) {
                console.warn(error);
                console.warn('Verifique os steps informados!');
            }

        }
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
        list.forEach(tutorial => {
            let renderedCard = this.renderTutorialCard(tutorial),
                cardListTarget = this.context.getElementById('tutorial_list');
            cardListTarget.append(renderedCard);
        })
    }

    renderTutorialCard(data) {        
        if (typeof data !== 'object') data.content = JSON.parse(data.content);

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