import Errors from "./Errors";

export default class Form
{
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
        this.isLoading = false;
    }

    post(endpoint) {
        return this.submit('POST', endpoint);
    }

    delete(endpoint) {
        return this.submit('DELETE', endpoint);
    }

    update(endpoint) {
        return this.submit('PUT', endpoint);
    }

    submit(requestType, endpoint) {
        this.startLoading();

        return new Promise((resolve, reject) => {
            window.axios({
                method: requestType,
                url: endpoint,
                data: this.data()
            })
                .then(response => {
                    console.log(response);

                    this.onSuccess(response.data);
                    resolve(response.data);
                })
                .catch(error => {
                    console.log(error);

                    this.onFail(error.response.data.errors);
                    reject(error.response.data);
                })
                .then(() => this.stopLoading());
        });
    }

    onSuccess() {
        this.resetData();
        this.errors.clearAll()
    }

    onFail(errors) {
        this.errors.record(errors);
    }

    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }

    resetData() {
        for (let field in this.originalData) {
            this[field] = ''
        }
    }

    startLoading() {
        this.isLoading = true;
    }

    stopLoading() {
        this.isLoading = false;
    }
}
