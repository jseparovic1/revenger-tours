export default class Errors
{
    constructor() {
        this.errors = {}
    }

    get(field) {
        if (this.errors[field]){
            return this.errors[field][0];
        }

        return;
    }

    clear(toClear) {
        delete this.errors[toClear];
    }

    has(field) {
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors) > 0;
    }

    clearAll() {
        this.errors = {};
    }

    record(recordedErrors) {
        for (let error in recordedErrors) {
            this.errors[error] = recordedErrors[error]
        }
    }
}
