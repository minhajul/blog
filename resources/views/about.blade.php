<x-layouts.app>
    <div class="py-6 px-4 overflow-hidden sm:px-6 lg:px-8 lg:py-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 items-center gap-14">
            <div class="col-span-1 lg:col-span-2">
                <div class="text-center">
                    <x-typewriter :phrases=[" />

                    <x-typewriter
                        :phrases="['Hello, I am Minhaj 👋', 'A Full Stack Software Engineer!', 'DevOps Enthusiast!']"
                        class="text-surface text-2xl md:text-3xl font-bold mb-3 leading-tight"
                    />
                </div>

                <p class="mt-3 text-base lg:text-lg font-normal text-color sm:mt-5 leading-7">
                    I am a full-stack software engineer with advanced knowledge in DevOps.
                    I specialize in developing scalable applications
                    using <strong>PHP</strong>, <strong>Javascript</strong>, <strong>Golang</strong>,
                    <strong>Laravel</strong>, <strong>Livewire</strong> and
                    JavaScript frameworks such as <strong>Node.js</strong>, <strong>React</strong>,
                    and <strong>Next.js</strong>.

                    I have hands-on experience with DevOps tools,
                    including <strong>Docker</strong>, <strong>Kubernetes</strong>, <strong>Pulumi</strong>, <strong>Terraform</strong>
                    to
                    streamline development, deployment, and scaling processes on <strong>AWS</strong>.

                    My experience also includes designing distributed systems and microservices, as well as managing
                    databases.

                    <span class="block pt-5">
                    I strive to apply my technical expertise to deliver impactful solutions while contributing to the success of forward-thinking technology teams.
                </span>
                </p>
            </div>

            <div class="col-span-1 lg:col-span-1">
                <img x-intersect="$el.classList.add('scale')"
                     src="{{ $user->avatarUrl() ?? "https://placehold.co/500x300" }}"
                     alt="Avatar" class="h-24 w-24 shrink-0 rounded-full md:h-32 md:w-32 p-2"
                     onerror="this.src='https://placehold.co/500x300'"
                />

                <div class="border text-normal font-bold text-color text-sm p-2 mt-5">
                    Software & Application Lead at
                    <a target="_blank" rel="noreferrer" class="text-blue-400 font-extrabold"
                       href="https://genofax.com">
                        Genofax
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>
