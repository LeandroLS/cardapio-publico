<template>
    <input class="form-input w-full rounded-md shadow-sm" :value="value" @input="$emit('input', $event.target.value)" ref="input">
</template>

<script>
    export default {
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

