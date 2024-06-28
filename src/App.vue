<template>
  <div>
    <h1>Vue Setup Completed!</h1>
    <input type="text" v-model="message" placeholder="Type here...">
    <p>Message from Vue: {{ message }}</p>
  </div>
</template>

<script>
export default {
  data() {
    return {
      message: "Hello, Vue!"
    };
  }
}
</script>

<style scoped>
/* Add styles here */
</style>
