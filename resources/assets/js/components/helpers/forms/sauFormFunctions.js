/**
 * SAU Form Functions
 * - Imported as a mixin for new Vue form components
 *
 * data() contains common properties referred to by the child input and error components
 *
 * populateData()
 * - Updates each child input component with form data if supplied on initial load
 *
 */
module.exports = {
    data() {
        return {
            classes: {},
            response: {
                errors: {},
                feedback: false
            },
            update: false,
        }
    },
    created: function() {
        if(this.data) {
            this.update = true;
            let data = JSON.parse(this.data);
            let self = this;
            // only populate data we have declared
            _.forIn(data, function(val, key) {
                if(self.excludes.hasOwnProperty(key)) {
                    // do nothing, field is marked as excluded
                } else if(self.form.hasOwnProperty(key)) {
                    self.form[key] = val;
                }
            })
        }
    },
    mounted: function() {
        this.populateData();
    },
    computed: {
        canSubmit() {
            let self = this;
            let canSubmit = 1;
            // Loop each field in the form object
            _.forIn(this.form, function(val, key) {
                // match each field to a fieldConfig object
                if(self[key+'Config'].required) {
                    // Field is required, check it has a value
                    if(!val) {
                        // prevent form from being submitted
                        canSubmit = 0;
                    }
                }
            });
            return canSubmit;
        }
    },
    methods: {
        populateData() {
            let inputs = this.$children;
            let form = this.form;
            // Loop through current form, for each value that exists
            // apply to the 'field' value of the matching child component
            inputs.forEach(function(input) {
                // check if the component has the label field
                if(_.has(input, 'label')) {
                    // Assign the form value to the input field
                    input.field = form[input.label];
                }
            });
        },
        onSubmit() {
            let that = this;
            let data = Object.assign({}, this.form);
            if(this.update) {
                // add ID to form
                data.id = JSON.parse(this.data).id;
                this.submitUrl = this.updateUrl;
            }
            axios.post(this.submitUrl, data)
                .then((response) => {
                    if (response.status == 200) {
                        that.$swal({
                            type: 'success',
                            title: 'Hotel has been added',
                            showConfirmButton: false,
                        });
                        setTimeout(function () {
                            window.location.href = that.redirectUrl
                        }, 1500);
                    }
                })
                .catch((error) => {
                    console.log(error);
                    this.response = error.response.data
                    this.response.feedback = true;
                    // Correct error messages appear under the corresponding input
                    // Need to add css classes to corresponding input as well
                })
        },
    }
}