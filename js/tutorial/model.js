export default class Tutorial {
    #title;
    #sub_title;
    #yt_link;
    #steps;

    constructor(...data) {
        if (typeof data[0] === 'object') data = data[0];
        this.#title = data?.title || data[0] || '';
        this.#sub_title = data?.sub_title || data[1] || '';
        this.#yt_link = data?.yt_link || data[2] || '';
        this.#steps = data?.steps || data[3] || [];
        this.referenceElem = data?.referenceElem || data[4] || null;
    }

    get title() {
        return this.#title;
    }

    get sub_title() {
        return this.#sub_title;
    }

    get yt_link() {
        return this.#yt_link;
    }

    get steps() {
        return {
            add: (step) => {
                this.#steps.push(step)
                if (this.referenceElem) {
                    let reference = this.referenceElem.querySelector('[tutorial="steps"]');
                    reference.append(step.stepElem);
                }
            },
            get: () => this.#steps
        };
    }

    set title(title){
        this.#title = title;
        if (this.referenceElem) {
            let reference = this.referenceElem.querySelector('[tutorial="title"]');
            reference.innerText = title;
        }
    }

    set sub_title(sub_title){
        this.#sub_title = sub_title;
        if (this.referenceElem) {
            let reference = this.referenceElem.querySelector('[tutorial="sub_title"]');
            reference.innerText = sub_title;
        }
    }

    set yt_link(yt_link){
        this.#yt_link = yt_link;
        if (this.referenceElem) {
            let reference = this.referenceElem.querySelector('[tutorial="yt_link"]');
            reference.innerText = yt_link;
        }
    }

    validate(){
        if (this.title && this.sub_title && this.yt_link && this.steps) return true;
    }

}
