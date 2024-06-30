Here's a `README.md` file for setting up a WordPress plugin using Vue CLI:

```markdown
# Vue Application as a WordPress Plugin

## Introduction

This guide will show you how to create a WordPress plugin using Vue.js. This approach extends the method described by Lisa Armstrong and offers a more comprehensive Vue.js integration.

## Prerequisites

- Node.js and npm installed
- Vue CLI installed
- A WordPress installation

## Steps

### Step 1: Create a Vue Application

First, create a Vue application:

```sh
npm create vue@latest
```

Select the default configuration and build the project:

```sh
npm run build
```

### Step 2: Create the WordPress Plugin

Create a file `wp-vue.php` in `/wp-content/plugins/wp-vue/` with the following code:

```php
<?php
/**
 * Plugin Name: WordPress Vue
 * Description: Vue-App in WordPress.
 */

function func_load_vuescripts() {
    wp_register_script('wpvue_vuejs', plugin_dir_url(__FILE__) . 'dist/js/app.js', array(), null, true);
    wp_register_script('wpvue_vuejs1', plugin_dir_url(__FILE__) . 'dist/js/chunk-vendors.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'func_load_vuescripts');

// Add shortcode
function func_wp_vue(){
    wp_enqueue_script('wpvue_vuejs');
    wp_enqueue_script('wpvue_vuejs1');

    $str = "<div id='app'>Message from Vue:</div>";
    return $str;
}

add_shortcode('wpvue', 'func_wp_vue');
?>
```

### Step 3: Upload the Vue Build Files

Upload the `dist` folder generated in Step 1 to the plugin folder `wp-vue`.

### Step 4: Use the Shortcode

Add the shortcode `[wpvue]` to one of your WordPress pages to display the Vue app. Simplify the `HelloWorld.vue` component:

**src/components/HelloWorld.vue**
```vue
<template>
  <div class="hello"></div>
</template>

<script>
export default {
  name: 'HelloWorld',
  props: {
    msg: String
  }
}
</script>

<style scoped>
</style>
```

Run the build task again:

```sh
npm run build
```

Upload the necessary files and delete the old ones. Update the scripts in `wp-vue.php` to match the new build files.

### Step 5: Remove Filename Hashing

To avoid editing the `wp-vue.php` script each time you build, add a `vue.config.js` file next to `package.json` with the following code:

**vue.config.js**
```javascript
module.exports = {
  filenameHashing: false,
}
```

Update the `wp-vue.php` script to remove hashes:

```php
<?php
/**
 * Plugin Name: WordPress Vue
 * Description: Vue-App in WordPress.
 */

function func_load_vuescripts() {
    wp_register_script('wpvue_vuejs', plugin_dir_url(__FILE__) . 'dist/js/app.js', array(), null, true);
    wp_register_script('wpvue_vuejs1', plugin_dir_url(__FILE__) . 'dist/js/chunk-vendors.js', array(), null, true);
}

add_action('wp_enqueue_scripts', 'func_load_vuescripts');

// Add shortcode
function func_wp_vue(){
    wp_enqueue_script('wpvue_vuejs');
    wp_enqueue_script('wpvue_vuejs1');

    $str = "<div id='app'>Message from Vue:</div>";
    return $str;
}

add_shortcode('wpvue', 'func_wp_vue');
?>
```

### Development

To develop in development mode and utilize Vue.js features, run:

```sh
npm run serve
```

This allows you to create a local Vue app for your plugin. This approach also supports atomic design workflow and scaling the Vue app for multiple plugins.

## Conclusion

Following these steps, you can successfully integrate a Vue application as a WordPress plugin, leveraging the power of Vue.js within WordPress. Happy coding!
```

This README file provides clear instructions for setting up a WordPress plugin using Vue CLI, from initial setup to development mode.
