class StepCard {
    constructor(step) {        

        if (!step.removeCardEffect) {
            let div_card = document.createElement('div'),
                div_card_body = document.createElement('div');

            div_card.classList.add('card', 'my-1');
            div_card.tabIndex = "-1";
            div_card_body.classList.add('card-body');
            for (const key in step.attributes) { div_card_body.setAttribute(key, step.attributes[key]); }
            this.#prepareText(step.text, div_card_body, step.link);
            div_card.append(div_card_body);

            this.finalElem = div_card;
        } else {
            let outer_div = document.createElement('div'),
                inner_h3 = document.createElement('h3');
            this.#prepareText(step.text, inner_h3, step.link);
            outer_div.classList.add('pt-3', 'px-2');
            outer_div.append(inner_h3);

            this.finalElem = outer_div;
        }        
    }

    #prepareText(text, parentElement, link) {
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