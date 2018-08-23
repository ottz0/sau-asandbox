<template>
  <div>
    <sau-preloader @abc="contentReady" v-if="!isLoaded"></sau-preloader>
    <div class="content" v-else>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi sagittis rhoncus orci ut finibus. Vestibulum ac mattis tellus. Maecenas tincidunt nisl et suscipit posuere. Vestibulum nec rutrum nisi. Phasellus scelerisque felis sed ipsum pulvinar, eu ornare justo vulputate. Maecenas arcu est, tincidunt eu semper non, cursus vitae est. Sed porttitor lectus id ultricies feugiat. Proin scelerisque et felis blandit accumsan. 
      </p>
    </div>
  </div>
</template>

<script>
export default {
  data(){
    return{
      isLoaded: false,
    }
  },
  methods:{
    contentReady(isLoaded) {
      this.isLoaded = isLoaded;
    }
  }
}
</script>

<style lang="scss">
</style>
