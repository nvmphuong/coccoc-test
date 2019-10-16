class Validator {
    /**
     * @param {string} value
     * @returns {Boolean}
     */
    isValidEmail(value) {
        const reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
        return reg.test(value)
    }
    /**
     * @param {string} value
     * @returns {Boolean}
     */
    isEmpty(value) {
        return value === '' || value === null
    }
    /**
     * @param {string} value
     * @returns {Boolean}
     */
    minLength(length, value) {
        return String(value).length >= length
    }
}
export default new Validator()
