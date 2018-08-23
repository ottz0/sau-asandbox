<template>
    <div class="error-ul">
        <ul v-if="sauerrors">
            <li v-for="error in sauerrors" :key="error" class="sau-form-feedback is-invalid">{{error}}</li>
        </ul>
        <ul v-else>
            <li class="sau-form-feedback">{{hint}}</li>
        </ul>
    </div>
</template>
<script>
export default {
    props: ['sauerrors', 'hint']
};
</script>
