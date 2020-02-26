<template>
<div>
      <b-form>
         <b-form-input class="text-center" placeholder="Search..."></b-form-input>
     </b-form>
    <b-list-group>
        <contact-component></contact-component>
        <contact-component></contact-component>
        <contact-component></contact-component>
    </b-list-group>
</div>
 
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
