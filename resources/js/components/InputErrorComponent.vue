<template>
    <div class="component error" v-if="validate">
        <small class="text-danger">{{ validate[0] }}</small>
    </div>
</template>

<script>
export default {
    props: {
        validate: null
    }
}
</script>
