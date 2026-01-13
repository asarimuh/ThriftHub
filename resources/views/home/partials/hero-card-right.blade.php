<div
    x-data="cardStackRight()"
    x-init="start()"
    class="relative w-56 h-80"
>
    <template x-for="(card, index) in cards" :key="index">
        <div
            class="absolute inset-0 transition-all duration-700 ease-in-out"
            :style="styleFor(index)"
        >
            <img
                :src="card.image"
                alt=""
                class="w-full h-full object-cover rounded-2xl shadow-xl"
            />
        </div>
    </template>
</div>

<script>
function cardStackRight() {
    return {
        active: 0,
        cards: [
            { image: '/products/placeholder.jpg' },
            { image: '/products/placeholder-2.jpg' },
            { image: '/products/placeholder-3.jpg' },
        ],

        start() {
            setInterval(() => {
                this.active = (this.active + 1) % this.cards.length
            }, 2500)
        },

        styleFor(index) {
            const position = (index - this.active + this.cards.length) % this.cards.length

            if (position === 0) {
                return `
                    z-index: 30;
                    opacity: 1;
                    transform: translateX(0) translateY(0) scale(1);
                `
            }

            if (position === 1) {
                return `
                    z-index: 20;
                    opacity: 0.4;
                    filter: blur(1px);
                    transform: translateX(50px) translateY(24px) scale(0.95);
                `
            }

            return `
                z-index: 10;
                opacity: 0;
                transform: translateX(-48px) translateY(24px) scale(0.9);
            `
        }
    }
}
</script>