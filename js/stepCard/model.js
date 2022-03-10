import Utils from '../utils.js'

export default class StepCard {
    #text;
    #attributes;
    #link;
    #removeCardEffect;
    #stepElem;

    constructor(step) {
        this.#text = step?.text || '';
        this.#attributes = step?.attributes || {};
        this.#link = step?.link || '';
        this.#removeCardEffect = step?.removeCardEffect || false;
        this.#createStepElement();
    }

    /**
     * @param {string} text
     */
    set text(text) {
        this.#text = text;
        this.#updateStepElement();
    }

    /**
     * @param {object} attributes
     */
    set attributes(attributes) {
        this.#attributes = attributes;
        this.#updateStepElement();
    }

    /**
     * @param {string} link
     */
    set link(link) {
        this.#link = link;
        this.#updateStepElement();
    }

    /**
     * @param {boolean} removeCardEffect
     */
    set removeCardEffect(removeCardEffect) {
        this.#removeCardEffect = removeCardEffect;
        this.#updateStepElement();
    }

    /**
     * @param {HTMLElement} stepElem
     */
    set stepElem(stepElem) {
        this.#stepElem = stepElem;
    }

    get text() {
        return this.#text;
    }

    get attributes() {
        return this.#attributes;
    }

    get link() {
        return this.#link;
    }

    get removeCardEffect() {
        return this.#removeCardEffect;
    }

    get stepElem() {
        return this.#stepElem;
    }

    #prepareText(text, parentElement, link) {
        /* /<[a-z]*?>.*?<\/[a-z]*?>/ Seleciona tags */
        /* /.*?(?=<[a-z]*?>|$)/ Seleciona tudo antes de uma tag */;
        if (!text) return;
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

    #createStepElement() {
        if (!this.removeCardEffect) {
            let div_card = document.createElement('div'),
                div_card_body = document.createElement('div');

            div_card.classList.add('card', 'my-1');
            div_card.tabIndex = "-1";
            div_card_body.classList.add('card-body');
            for (const key in this.attributes) {
                div_card_body.setAttribute(key, this.attributes[key]);
                if (key === 'yt-timestamp') div_card_body.setAttribute('fancyTime', Utils.fancyTimeFormat(this.attributes[key]));
            }
            this.#prepareText(this.text, div_card_body, this.link);
            div_card.append(div_card_body);

            this.#stepElem = div_card;
        } else {
            let outer_div = document.createElement('div'),
                inner_h3 = document.createElement('h3');
            this.#prepareText(this.text, inner_h3, this.link);
            outer_div.classList.add('pt-3', 'px-2');
            outer_div.append(inner_h3);

            this.#stepElem = outer_div;
        }
    }

    #updateStepElement() {
        if (!this.removeCardEffect) {
            let div_card_body = this.stepElem.querySelector('.card-body');
            while (div_card_body.attributes.length > 0) div_card_body.removeAttribute(div_card_body.attributes[0].name);
            div_card_body.classList.add('card-body');
            div_card_body.innerHTML = "";
            for (const key in this.attributes) { div_card_body.setAttribute(key, this.attributes[key]); }
            this.#prepareText(this.text, div_card_body, this.link);
            return;
        }
        let inner_h3 = this.stepElem.querySelector('h3');
        inner_h3.innerHTML = "";
        this.#prepareText(this.text, inner_h3, this.link);
    }
}