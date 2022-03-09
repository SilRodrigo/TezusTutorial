import StepCardFactory from "./stepCard/factory";

export default class TutorialScreenRender extends StepCardFactory {
    constructor(context, tutorialPath) {
        this.context = context;
        this.tutorialPath = tutorialPath;
        this.loadSteps(tutorialPath);
    }

    async loadSteps(path) {
        let tutorial = await import(path);
        if (!tutorial) return;
        this.renderTutorial(tutorial.default)
    }

    renderTutorial(tutorial) {
        this.context.getElementById('tutorial_title').innerText = tutorial.tutorial_title;
        this.context.getElementById('sub_title').innerText = tutorial.sub_title;
        this.context.getElementById('player').setAttribute('yt-link', tutorial.yt_link);
        this.renderStepsCard(this.context.getElementById('tutorial_steps'), tutorial.steps)
    }
}