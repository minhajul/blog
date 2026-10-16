@props([
    'phrases' => [],
    'typingSpeed' => 90,
    'pauseAfterComplete' => 1800,
    'as' => 'div',
])

{{--
    Every phrase is rendered invisibly in the same grid cell as the animated text,
    so the element always reserves the height of the longest phrase and never
    shifts the surrounding layout while typing.
--}}
<{{ $as }}
    x-data="{
        phrases: {{ Js::from(array_values($phrases)) }},
        typingSpeed: {{ (int) $typingSpeed }},
        pauseAfterComplete: {{ (int) $pauseAfterComplete }},
        currentIndex: 0,
        characters: [],
        charIndex: 0,
        displayText: '',
        isFading: false,
        timer: null,

        init() {
            if (this.phrases.length === 0) {
                return;
            }

            if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
                this.displayText = this.phrases[0];

                return;
            }

            this.startPhrase();
        },

        destroy() {
            clearTimeout(this.timer);
        },

        splitIntoCharacters(text) {
            if (typeof Intl !== 'undefined' && Intl.Segmenter) {
                return Array.from(new Intl.Segmenter().segment(text), (part) => part.segment);
            }

            return Array.from(text);
        },

        startPhrase() {
            this.characters = this.splitIntoCharacters(this.phrases[this.currentIndex]);
            this.charIndex = 0;
            this.displayText = '';
            this.typeNextCharacter();
        },

        typeNextCharacter() {
            if (this.charIndex < this.characters.length) {
                this.charIndex++;
                this.displayText = this.characters.slice(0, this.charIndex).join('');
                this.timer = setTimeout(() => this.typeNextCharacter(), this.typingSpeed);

                return;
            }

            this.timer = setTimeout(() => this.fadeToNextPhrase(), this.pauseAfterComplete);
        },

        fadeToNextPhrase() {
            this.isFading = true;

            this.timer = setTimeout(() => {
                this.currentIndex = (this.currentIndex + 1) % this.phrases.length;
                this.isFading = false;
                this.startPhrase();
            }, 300);
        },
    }"
    {{ $attributes->class('grid') }}
>
    <span class="sr-only">{{ implode('. ', $phrases) }}</span>

    @foreach($phrases as $phrase)
        <span class="invisible col-start-1 row-start-1" aria-hidden="true">{{ $phrase }}<span class="typewriter-cursor"></span></span>
    @endforeach

    <span class="col-start-1 row-start-1" aria-hidden="true">
        <span x-text="displayText" class="typewriter-text" :class="{ 'typewriter-text-fading': isFading }"></span><span class="typewriter-cursor"></span>
    </span>
</{{ $as }}>
