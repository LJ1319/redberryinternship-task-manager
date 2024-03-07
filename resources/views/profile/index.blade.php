<x-layout>
    <div class="mx-auto h-max w-1/3 pb-16">
        <h1 class="text-4xl text-[#2F363D] font-bold text-center">{{ strtoupper(__('messages.profile')) }}</h1>

        <form action="{{ route('profile.update', $user) }}" method="post" enctype="multipart/form-data"
              class="space-y-16">
            @method('put')
            @csrf

            <x-form.wrapper state="{ label: true }">
                <x-form.label name="email" text="email"/>
                <input type="email" id="email" value="{{ $user->email }}"
                       class="h-20 w-full px-4 rounded-[14px] bg-[#F6F8FA] focus:outline-none focus:ring-1 focus:ring-[#499AF9]"
                       disabled>
            </x-form.wrapper>

            <div class="space-y-6">
                <h4 class="text-center text-[#2F363D]">{{ strtoupper(__('messages.change_password')) }}</h4>

                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="password" text="current_password"/>
                    <x-form.input type="password"
                                  name="password"
                                  error="password"
                                  text="current_password"
                    />
                    <x-form.error name="password"/>
                </x-form.wrapper>

                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="new_password" text="new_password"/>
                    <x-form.input type="password"
                                  name="new_password"
                                  error="new_password"
                                  text="new_password"
                    />
                    <x-form.error name="new_password"/>
                </x-form.wrapper>


                <x-form.wrapper state="{ label: false }">
                    <x-form.label name="new_password_confirmation" text="password_confirmation"/>
                    <x-form.input type="password"
                                  name="new_password_confirmation"
                                  error="new_password_confirmation"
                                  text="password_confirmation"
                    />
                </x-form.wrapper>
            </div>

            <div class="space-y-8">
                <h4 class="text-center text-[#2F363D]">{{ strtoupper(__('messages.change_photos')) }}</h4>

                <div class="flex items-center justify-around" x-data="imageData()">
                    <div class="h-32 w-32">
                        <img x-data="setDefaultPreview('{{ $profilePhoto }}')" :src="previewUrl" alt=""
                             class="h-full w-full rounded-full border">
                    </div>

                    <div>
                        <x-form.upload-button name="profile_photo" text="upload_profile"/>
                        <x-form.error name="profile_photo"/>
                    </div>

                    <div x-show="showProfileDelete">
                        <x-form.delete-button name="profile_photo"/>
                    </div>
                </div>

                <div class="flex items-center justify-around" x-data="imageData()">
                    <div class="h-32 w-32">
                        <img x-data="setDefaultPreview('{{ $coverPhoto }}')" :src="previewUrl" alt=""
                             class="h-full w-full rounded-tl-2xl rounded-bl-2xl border object-cover">
                    </div>

                    <div>
                        <x-form.upload-button name="cover_photo" text="upload_cover"/>
                        <x-form.error name="cover_photo"/>
                    </div>

                    <div x-show="showCoverDelete">
                        <x-form.delete-button name="cover_photo"/>
                    </div>
                </div>
            </div>

            <x-form.button text="change"/>
        </form>
    </div>
</x-layout>


<script>
    function imageData() {
        return {
            previewUrl: "",
            showProfileDelete: false,
            showCoverDelete: false,
            setDefaultPreview(file) {
                if (file.includes('images/')) {
                    this.previewUrl = file;
                } else {
                    this.previewUrl = `storage/${file}`;
                }
            },
            updatePreview(file) {
                let files = document.getElementById(file).files;
                this.previewUrl = URL.createObjectURL(files[0]);
            },
            showDeleteButton(value) {
                if (value === 'profile_photo') {
                    this.showProfileDelete = true;
                }

                if (value === 'cover_photo') {
                    this.showCoverDelete = true;
                }
            },
            clearPreview(file) {
                document.getElementById(file).value = null;
                this.previewUrl = "";
            }
        };
    }
</script>
