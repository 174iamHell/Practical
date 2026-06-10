import { ref, onMounted, onUnmounted } from 'vue'

enum Devices {
    Mobile = 'mobile',
    Desktop = 'desktop'
}

export const useDevice = () => {
    const device = ref<Devices>(Devices.Desktop)

    const isMobile = computed(() => device.value === Devices.Mobile);

    function setMobile() {
        device.value = Devices.Mobile;
    }

    function setDesktop() {
        device.value = Devices.Desktop;
    }

    const checkWidth = () => {
        if (import.meta.client && window.innerWidth < 768) {
            setMobile();
        } else {
            setDesktop();
        }
    }

    onMounted(() => {
        checkWidth()
        window.addEventListener('resize', checkWidth)
    })

    onUnmounted(() => {
        if (import.meta.client) {
            window.removeEventListener('resize', checkWidth)
        }
    })

    return { device, isMobile }
}
