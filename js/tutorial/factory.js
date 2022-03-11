import Tutorial from "./model.js";

export default class TutorialFactory {    

    generateTutorial(data) {
        return new Tutorial(data);
    }

}