<template>

    <div>

        <!-- Normal Text Input -->
        <div class="form-group" v-if="config.type == 'text'">
            <label :class="{ 'required' : config.required }">{{ config.label }}</label>
            <div class="sau-input-ico input-group">
                <i class="sau-input-ico-fa fa" :class="this.$parent.classes[label]"></i>
                <slot name="before"></slot>
                <input :class="[this.$parent.classes[label], config.class]"
                    v-model="field"
                    :name="label"
                    class="form-control"
                    @mouseleave="checkValidation(label, field)"
                    @blur="checkValidation(label, field)"
                    :placeholder="config.placeholder"/>
            </div>
            <sau-error :sauerrors="this.$parent.response.errors[label]" :hint="config.hint"></sau-error>
            <slot name="after"></slot>
        </div>

        <!-- Text Area Input -->
        <div class="form-group" v-if="config.type == 'textarea'">
            <label :class="{ 'required' : config.required }">{{ config.label }}</label>
            <div class="sau-input-ico input-group">
                <i class="sau-input-ico-fa fa" :class="this.$parent.classes[label]"></i>
                <slot name="before"></slot>
                <textarea :class="[this.$parent.classes[label], config.class]"
                    v-model="field"
                    :name="label"
                    class="form-control"
                    @mouseleave="checkValidation(label, field)"
                    @blur="checkValidation(label, field)"
                    :placeholder="config.placeholder"></textarea>
            </div>
            <sau-error :sauerrors="this.$parent.response.errors[label]" :hint="config.hint"></sau-error>
            <slot name="after"></slot>
        </div>

        <!-- Select Box Input -->
        <div class="form-group" v-if="config.type == 'select'">
            <label :class="{ 'required' : config.required }">{{ config.label }}</label>
            <div class="sau-input-ico input-group">
                <i class="sau-input-ico-fa fa" :class="this.$parent.classes[label]"></i>
                <slot name="before"></slot>
                <select :class="[this.$parent.classes[label], config.class]"
                    v-model="field"
                    :name="label"
                    class="form-control"
                    @change="checkValidation(label, field)">
                    <option disabled selected value="">Please Select</option>
                    <option v-for="option in config.options" :key="option.id" :value="option.val">{{ option.val }}</option>
                </select>
            </div>
            <sau-error :sauerrors="this.$parent.response.errors[label]" :hint="config.hint"></sau-error>
            <slot name="after"></slot>
        </div>

        <!-- Checkbox Input -->
        <div class="form-check" v-if="config.type == 'checkbox'">
            <label :class="{ 'required' : config.required }">{{ config.label }}</label>
            <div class="sau-input-ico input-group">
                <i class="sau-input-ico-fa fa" :class="this.$parent.classes[label]"></i>
                <slot name="before"></slot>
                <label class="form-check-label">
                    <input v-model="field"
                        class="form-check-input"
                        :class="config.class"
                        type="checkbox"
                        :name="label"
                        @change="checkValidation(label, field)">
                    <div>{{ config.description }}</div>
                </label>
            </div>
            <sau-error :sauerrors="this.$parent.response.errors[label]" :hint="config.hint"></sau-error>
            <slot name="after"></slot>
        </div>

        <!-- Radio -->
        <div v-if="config.type == 'radio'" id="radio" >
            <div class="sau-input-ico input-group">
                <i class="sau-input-ico-fa fa" :class="$parent.classes[label]"></i>
                <label :class="{ 'required' : config.required }">{{ config.label }}</label>
            </div>
            <div class="form-check" v-for="option in config.options" :key="option.id">
                <slot name="before"></slot>
                <label class="form-check-label">
                    <input v-model="field"
                        :value="option.val"
                        class="form-check-input"
                        :class="config.class"
                        type="radio"
                        :name="label"
                        @change="checkValidation(label, field)" />
                    {{ option.val }}
                </label>
            </div>
            <sau-error :sauerrors="this.$parent.response.errors[label]" :hint="config.hint"></sau-error>
            <slot name="after"></slot>
        </div>

    </div>

</template>
<script>
import sauFieldFunctions from './sauFieldFunctions';
export default {
    mixins: [sauFieldFunctions],
    /**
    Config = {
        saufield : // must match a form{} property in the parent component
        type:
        placeholder:
        hint: // text in place of error message
        label:
        options: // for select & radio
        description: // for checkboxes
        required: // for css class and used to determine canSubmit computed property which disables the final submit button
    }
    <div slot="before"></div>
    <div slot="after"></div>
    */
    props: ['config', 'before', 'after'],
    data() {
        return {
            label: '',
            field: ''
        }
    },
    created() {
        this.label = this.config.saufield;
    }
};
</script>
<style>
 label {
     display:block;
 }
 label.required:after {
     content: '*';
     color:red;
     padding:5px;
 }
 .error-ul {
     min-height: 19px;
     height:auto;
 }
 .sau-input-ico .sau-input-ico-fa {
     z-index: 5;
 }
 #radio .input-group {
     display:block !important;
 }
</style>