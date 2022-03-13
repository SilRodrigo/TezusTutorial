export default class Tutorial {
    #tutorial_title;
    #sub_title;
    #yt_link;
    #steps;

    constructor(...data) {
        if (typeof data[0] === 'object') data = data[0];
        this.#tutorial_title = data?.tutorial_title || data[0] || '';
        this.#sub_title = data?.sub_title || data[1] || '';
        this.#yt_link = data?.yt_link || data[2] || '';
        this.#steps = data?.steps || data[3] || [];
        this.referenceElem = data?.referenceElem || data[4] || null;
        this.isStepsDraggable = data?.isStepsDraggable || data[5] || false;
    }

    get tutorial_title() {
        return this.#tutorial_title;
    }

    get sub_title() {
        return this.#sub_title;
    }

    get yt_link() {
        try {
            let yt_url = new URL(this.#yt_link),
                yt_id = yt_url.search.replace('?v=', '');
            return yt_id;
        } catch (error) {
            return this.#yt_link;
        }
    }

    get steps() {
        return {
            add: (step) => {
                this.#steps.push(step)
                if (this.referenceElem) {
                    let reference = this.referenceElem.querySelector('[tutorial="steps"]');
                    reference.append(step.stepElem);
                    step.fillAttributes();
                }
            },
            get: () => this.#steps,
            removeLast: () => {
                if (this.#steps.length === 0) return;
                this.#steps.pop();
                if (this.referenceElem) {
                    let reference = this.referenceElem.querySelector('[tutorial="steps"]');
                    reference.removeChild(reference.lastChild);
                }
            },
            reorder: () => {
                let newOrder = this.referenceElem.querySelectorAll('[tutorial="steps"] .card'),
                    currentOrder = this.steps.get(),
                    finalOrder = [];

                newOrder.forEach(newStep => {
                    finalOrder.push(currentOrder.find(oldStep => oldStep.stepElem.isSameNode(newStep)));
                });

                this.#steps = finalOrder;
            }
        };
    }

    set tutorial_title(title) {
        this.#tutorial_title = title;
        if (this.referenceElem) {
            let reference = this.referenceElem.querySelector('[tutorial="tutorial_title"]');
            reference.innerText = title;
        }
    }

    set sub_title(sub_title) {
        this.#sub_title = sub_title;
        if (this.referenceElem) {
            let reference = this.referenceElem.querySelector('[tutorial="sub_title"]');
            reference.innerText = sub_title;
        }
    }

    set yt_link(yt_link) {
        this.#yt_link = yt_link;
        if (this.referenceElem) {
            let reference = this.referenceElem.querySelector('[tutorial="yt_link"]');
            reference.innerText = yt_link;
        }
    }

    set steps(step) {
        return;
    }

    validate() {
        if (this.tutorial_title && this.sub_title && this.yt_link && this.steps.get().length > 0) return true;
    }

    toJSON() {
        return {
            tutorial_title: this.tutorial_title,
            sub_title: this.sub_title,
            yt_link: this.yt_link,
            steps: this.steps.get()
        }
    }

}
