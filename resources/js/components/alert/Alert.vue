<template>
    <div v-if="openAlertBox" :class="[bgColor, borderColor, textColor]" class="mx-auto max-w-2xl lg:max-w-5xl px-4 py-3 rounded relative" 
        role="alert">
        <span class="block font-bold sm:inline">{{ text }}</span>
    </div>
</template>

<script lang="js">
import { defineComponent, ref } from 'vue';

export default defineComponent({
    name: 'Alert',
    props: {
        bgColor: {
            type: String,
            default: 'bg-green-100'
        },
        borderColor: {
            type: String,
            default: 'border border-green-400'
        },
        textColor: {
            type: String,
            default: 'text-green-700'
        },
        text: {
            type: String,
            default: ''
        }
    },
    data() {
        let openAlertBox = ref(false);

        if(this.text != null) {
            openAlertBox.value = true;
            setTimeout(() => {
                openAlertBox.value = false;
            }, 3000)
        }

        return {
            openAlertBox
        };
    }
})
</script>