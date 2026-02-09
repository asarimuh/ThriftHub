<div x-data="cardStackRight()" x-init="start()" class="relative w-56 h-80">
    <template x-for="(card, index) in cards" :key="index">
        <div class="absolute inset-0 transition-all duration-700 ease-in-out overflow-hidden " :style="styleFor(index)">
            <!-- Image -->
            <img :src="card.image" alt="" class="w-full h-full object-cover rounded-2xl shadow-xl" />

            <div x-show="isActive(index)" x-transition.opacity.duration.300ms class="pointer-events-none absolute inset-x-0 bottom-0 h-20
           bg-gradient-to-t
           from-gray-900/45
           via-gray-900/25
           to-transparent rounded-b-2xl"></div>

            <!-- Bottom Overlay (slide up/down) -->
            <div class="absolute inset-x-0 bottom-0 rounded-b-2xl
            p-3
           transition-transform duration-500 ease-out delay-150" :class="isActive(index)
        ? 'translate-y-0'
        : 'translate-y-full pointer-events-none'">
                <p class="text-sm font-semibold text-white leading-tight">
                    <span x-text="card.name"></span>
                </p>

                <div class="flex items-center justify-between mt-1">
                    <span class="text-xs text-gray-200" x-text="card.condition"></span>
                    <span class="text-sm font-bold text-white" x-text="card.price"></span>
                </div>
            </div>

        </div>
    </template>
</div>

<script>
    function cardStackRight() {
        return {
            active: 0,
            cards: [
                {
                    image: '/storage/products/placeholder-2-white-bg.png',
                    name: 'Uniqlo Oversized Tee',
                    condition: 'Like New',
                    price: 'Rp 75.000',
                },
                {
                    image: '/storage/products/placeholder.jpg',
                    name: 'Nike Windbreaker',
                    condition: 'Preloved',
                    price: 'Rp 180.000',
                },
                {
                    image: '/storage/products/placeholder-2-white-bg.png',
                    name: 'Levi’s 501 Jeans',
                    condition: 'Good Condition',
                    price: 'Rp 220.000',
                },
            ],

            start() {
                setInterval(() => {
                    this.active = (this.active + 1) % this.cards.length
                }, 3500)
            },

            isActive(index) {
                return index === this.active
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