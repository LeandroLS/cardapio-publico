<template>
    <input :disabled="disabled" class="form-input rounded-md shadow-sm" :value="value" @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
        props: ['value', 'disabled'],
        props: {
            value: [String, Number],
            disabled: {
                type: Boolean,
                default: function(){
                    return false;
                }
            }
        },

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

