<template>
    <input class="form-input w-full rounded-md shadow-sm" :placeholder="placeholder" :value="value" @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: {
            value: [String, Number],
            placeholder: String
        },

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

