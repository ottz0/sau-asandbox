<template>
    <div class="row">
        <div class="col">
            <div class="card">
                <h4 class="card-header">Inline Validation Example</h4>
                <div class="card-body">

                    <div v-if="response.feedback" class="sau-form-message text-center">
                        <b-alert variant="danger" show>Oops! We are unable to process your request. Please ensure all fields have been filled out appropriately.</b-alert>
                    </div>
                    <div v-else class="sau-form-message text-center">
                        <b-alert variant="info" show>More Australian businesses choose us for their server hosting than any other provider.</b-alert>
                    </div>

                    <form @submit.prevent="onSubmit">

                        <div class="form-row">
                            <div class="col-sm-6">
                                <sau-input :config="emailConfig"></sau-input>
                            </div>
                            <div class="col-sm-6">
                                <sau-input :config="addressConfig"></sau-input>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-6">
                                <sau-input :config="nameConfig"></sau-input>
                            </div>
                            <div class="col-sm-6">
                                <sau-input :config="cardConfig">
                                    <div slot="before" class="input-group-addon"><img :src="creditCardImage"></div>
                                </sau-input>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <sau-input :config="messageConfig"></sau-input>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <sau-input :config="genderConfig"></sau-input>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col">
                                <sau-input :config="updatesConfig"></sau-input>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-sm-6">
                                <sau-input :config="ageConfig"></sau-input>
                            </div>
                            <div class="col-sm-6">
                                <sau-input :config="ratingConfig"></sau-input>
                            </div>
                        </div>

                        <pre>{{ this.form }}</pre>

                        <div class="form-group">
                            <button class="btn btn-success btn-lg btn-block" type="submit" :disabled="!canSubmit">Send Request</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import sauFormFunctions from './helpers/forms/sauFormFunctions';
export default {
    mixins: [sauFormFunctions],
    props: ['data'],
    data() {
		return {
            inlineUrl: '/validation/check-validation',
            submitUrl: '/validation/process-request',
            updateUrl: '/validation/process-update',
            redirect: '/validation/success',
            excludes: {
                id: ''
            },
            form: {
                address: '',
                email: '',
                name: '',
                card: '',
                message: '',
                gender: '',
                updates: '',
                age: '',
                rating: '',
            },
            addressConfig: {
                saufield : 'address',
                type: 'text',
                placeholder: 'Address',
                hint: 'Must be a valid address',
                label: 'Address',
                class: 'form-control-sm',
                required: false
            },
            emailConfig: {
                saufield : 'email',
                type: 'text',
                placeholder: 'Email',
                hint: 'Must be a valid email',
                label: 'Email',
                class: 'form-control-sm',
                required: true
            },
            nameConfig: {
                saufield : 'name',
                type: 'text',
                placeholder: 'Name',
                hint: 'Must be a valid name',
                label: 'Name',
                class: 'form-control-sm',
                required: true
            },
            cardConfig: {
                saufield : 'card',
                type: 'text',
                placeholder: 'Card',
                hint: 'Must be a valid card',
                label: 'Card',
                class: 'form-control-sm',
                required: true
            },
            messageConfig: {
                saufield : 'message',
                type: 'textarea',
                placeholder: 'Message',
                hint: '',
                label: 'Message',
                class: 'form-control-sm',
                required: true
            },
            genderConfig: {
                saufield : 'gender',
                type: 'select',
                label: 'Gender',
                options: [
                    {
                        id: 0,
                        val: 'Female'
                    },
                    {
                        id: 1,
                        val: 'Male'
                    }
                ],
                class: 'form-control-sm',
                required: true
            },
            updatesConfig: {
                saufield : 'updates',
                type: 'checkbox',
                label: 'Join',
                description: 'Receive updates by joining our mailing list',
                class: 'form-control-sm',
                required: true
            },
            ageConfig: {
                saufield : 'age',
                type: 'radio',
                label: 'Age',
                options: [
                    {
                        id: 0,
                        val: 'Under 18'
                    },
                    {
                        id: 1,
                        val: 'Over 18'
                    }
                ],
                class: 'form-control-sm',
                required: true
            },
            ratingConfig: {
                saufield : 'rating',
                type: 'radio',
                label: 'Rating',
                options: [],
                class: 'form-control-sm',
                required: true
            },
            img: '/img/credit-cards/cc.gif',
		}
    },
    methods: {

    },
    computed: {
        creditCardImage() {
            // let card = this.$children.find(function(element) {
            //     return element.label === 'card';
            // });
            let card = this.form.card;
            let path = '/img/credit-cards/';
            if(!card) {
                return path+'cc.gif';
            }
            let type = card.substr(0,1);
            if(card == ''){
                return path+'cc.gif';
            }
            if(card.substr(0,3) == '300') {
                return path+'dc.gif';
            }

            switch(type) {
                case '3':
                    return path+'ax.gif';
                        break;
                case '5':
                    return path+'mc.gif';
                        break;
                case '4':
                    return path+'vs.gif';
                        break;
                default:
                    return path+'ncc.gif';
                        break;
            }
        }
    },
    created: function() {
        this.ratingConfig.options = _.range(1,11).map(function(n) {
            return {'id': n, 'val': n}
        });
    },
};
</script>
