/**
 * SAU Field Functions
 * - Imported as a mixin for FormInput.vue
 *
 * FormInput recieves a label which matches up to the following parent properties:
 * - form: {}
 * - classes: {}
 * - response: {errors: {}}
 *
 * This handles applying appropriate validation classes, form values and error messages.
 *
 * checkValidation() is triggered when an input is filled out
 * applyClasses() is triggered after checkValidation()
 */
module.exports = {
    data() {
        return {
        }
    },
    methods: {
        checkValidation(key, val) {
            let data = {};
            data[key] = val;
            // Add 'inline' property so that in the validation class it filters down to only the posted field
            // Prevents 'required' errors for fields not submitted while validating as fields are filled out
            data['inline'] = true;
            let validation = axios.post(this.$parent.inlineUrl, data)
            // Clear errors if successful response
            .then((response) => {
                field = JSON.parse(response.config.data);
                property = Object.getOwnPropertyNames(field);
                // remove response field from errors
                delete this.$parent.response.errors[property[0]];
                // Turn generic error feedback on or off
                this.$parent.response.feedback = Object.keys(this.$parent.response.errors).length === 0 ? false : true;
                // Add value to parent form
                this.$parent.form[property[0]] = field[property[0]];
            })
            // Catch validation errors
            .catch((error) => {
                // Capture any existing errors so they aren't lost when we add the new error
                let errors = this.$parent.response.errors ? this.$parent.response.errors : {};
                for(err in error.response.data.errors) {
                    // Clear the field value on the parent form incase the field is used in the canSubmit() computed property
                    // Fields are only updated when they are valid so it will retain its original value if its an 'Update' form
                    this.$parent.form[err] = '';
                    errors[err] = error.response.data.errors[err];
                }
                // Assign the updated errors back to the parent property
                this.$parent.response.errors = errors;
                // Set parent error flag to display generic feedback
                this.$parent.response.feedback = true;
            });
            // Apply css classes for user feedback
            validation.then(() => this.applyClasses(key));
        },
        applyClasses(field) {
            let error = this.$parent.response.errors[field];
            if(error) {
                // An error exists for this field - apply invalid css class
                this.$parent.classes[field] = 'is-invalid fa-times';
            } else if(this.$parent.form[field]) {
                // Assume this field is valid due to not being in errorResponse and having a value
                this.$parent.classes[field] = 'is-valid fa-check';
            } else {
                // Blank field - remove classes
                this.$parent.classes[field] = '';
            }
            this.$forceUpdate();
        }
    }
}