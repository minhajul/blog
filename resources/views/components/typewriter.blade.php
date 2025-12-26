@props([
    'phrases' => [],
    'typingSpeed' => 100,
    'pauseAfterComplete' => 1500,
    'class' => '',
])

<div
    x-data="{
        phrases: {{ Js::from($phrases) }},
        typingSpeed: {{ $typingSpeed }},
        pauseAfterComplete: {{ $pauseAfterComplete }},
        currentIndex: 0,
        displayText: '',
        charIndex: 0,
        isAnimating: false,

        init() {
            if (this.phrases.length > 0) {
                this.$nextTick(() => {
                    this.typeCurrentSentence();
                });
            }
        },

        typeCurrentSentence() {
            const currentSentence = this.phrases[this.currentIndex];

            if (this.charIndex < currentSentence.length) {
                this.displayText = currentSentence.slice(0, this.charIndex + 1);
                this.charIndex++;

                setTimeout(() => {
                    this.typeCurrentSentence();
                }, this.typingSpeed);
            } else {
                setTimeout(() => {
                    this.fadeOutAndNext();
                }, this.pauseAfterComplete);
            }
        },

        fadeOutAndNext() {
            this.isAnimating = true;
            const textElement = this.$refs.text;

            textElement.classList.add('typewriter-fade-out');

            setTimeout(() => {
                this.currentIndex = (this.currentIndex + 1) % this.phrases.length;
                this.displayText = '';
                this.charIndex = 0;

                textElement.classList.remove('typewriter-fade-out');
                textElement.classList.add('typewriter-fade-in');

                this.$nextTick(() => {
                    this.typeCurrentSentence();
                });

                setTimeout(() => {
                    textElement.classList.remove('typewriter-fade-in');
                    this.isAnimating = false;
                }, 300);
            }, 300);
        }
    }"
    {{ $attributes->merge(['class' => $class]) }}
>
    <span x-ref="text" x-text="displayText" class="typewriter-text"></span>
    <span class="typewriter-cursor"></span>
</div>

@once
    @push('styles')
        <style>
            .typewriter-text {
                display: inline-block;
                opacity: 1;
                transition: opacity 0.3s ease-in-out;
            }

            .typewriter-fade-out {
                opacity: 0;
                animation: fadeOut 0.3s ease-in-out forwards;
            }

            .typewriter-fade-in {
                opacity: 0;
                animation: fadeIn 0.3s ease-in-out forwards;
            }

            @keyframes fadeOut {
                from {
                    opacity: 1;
                    transform: translateY(0);
                }
                to {
                    opacity: 0;
                    transform: translateY(-10px);
                }
            }

            @keyframes fadeIn {
                from {
                    opacity: 0;
                    transform: translateY(10px);
                }
                to {
                    opacity: 1;
                    transform: translateY(0);
                }
            }

            .typewriter-cursor {
                display: inline-block;
                width: 2px;
                height: 1em;
                background-color: currentColor;
                margin-left: 0.25rem;
                vertical-align: middle;
                animation: blink 1s step-end infinite;
            }

            @keyframes blink {
                0%, 49% { opacity: 1; }
                50%, 100% { opacity: 0; }
            }
        </style>
    @endpush
@endonce
