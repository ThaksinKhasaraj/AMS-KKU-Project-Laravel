<x-jet-form-section submit="updateProfileInformation">
    
 
    <x-slot name="form">
        <!-- Profile Photo -->
        {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos()) --}}
            {{-- <div x-data="{photoName: null, photoPreview: null}" class="col-span-12 sm:col-span-10">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " /> --}}

                {{-- <x-jet-label for="photo" value="{{ __('รูปโปรไฟล์') }}" /> --}}

                <!-- Current Profile Photo -->
                {{-- <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div> --}}

                {{-- <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('เปลี่ยน') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('ลบรูปโปรไฟล์') }}
                    </x-jet-secondary-button>
                @endif --}}

                {{-- <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif --}}

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('ชื่อ-สกุล') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- emp_position -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="emp_position" value="{{ __('ตำแหน่ง') }}" />
            <x-jet-input id="emp_position" type="text" class="mt-1 block w-full" wire:model.defer="state.emp_position" autocomplete="emp_position"  />
            <x-jet-input-error for="emp_position" class="mt-2" />
        </div>
        <!-- emp_type -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="emp_type" value="{{ __('ประเภทบุคลากร') }}" />
            <x-jet-input id="emp_type" type="text" class="mt-1 block w-full" wire:model.defer="state.emp_type" autocomplete="emp_type"  />
            <x-jet-input-error for="emp_type" class="mt-2" />
        </div>

        <!-- dept_name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="dept_name" value="{{ __('หน่วยงาน/สาขาวิชา') }}" /> 
            <x-jet-label for="dept_name" value="{{ Auth::user()->department->dept_name ?? '' }} " />
            <x-jet-label id="dept_name"  wire:model.defer="state.{{ Auth::user()->department->dept_name ?? '' }}" autocomplete="dept_name"  />
            <x-jet-input-error for="dept_name" class="mt-2"  />
        </div>

        <!-- emp_phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="emp_phone" value="{{ __('เบอร์โทรศัพท์') }}" />
            <x-jet-input id="emp_phone" type="text" class="mt-1 block w-full" wire:model.defer="state.emp_phone" autocomplete="emp_phone"  />
            <x-jet-input-error for="emp_phone" class="mt-2" />
        </div>

         <!-- Email -->
         <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('อีเมล') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- emp_note  -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="emp_note" value="{{ __('หมายเหตุ') }}" />
            <x-jet-input id="emp_note" type="text" class="mt-1 block w-full" wire:model.defer="state.emp_note" autocomplete="emp_note"/>
            <x-jet-input-error for="emp_note" class="mt-2" />
        </div>

         {{-- <!-- sign -->
         @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
         <div x-data="{photoName: null, photoPreview: null}" class="col-span-12 sm:col-span-10">
             <!-- Profile Photo File Input -->
             <input type="file" class="hidden"
                         wire:model="photo"
                         x-ref="photo"
                         x-on:change="
                                 photoName = $refs.photo.files[0].name;
                                 const reader = new FileReader();
                                 reader.onload = (e) => {
                                     photoPreview = e.target.result;
                                 };
                                 reader.readAsDataURL($refs.photo.files[0]);
                         " />

             {{-- <x-jet-label for="photo" value="{{ __('ลายเซ็น') }}" /> --}}

             {{-- <!-- Current Profile Photo -->
             <div class="mt-2" x-show="! photoPreview">
                 <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
             </div>

             <!-- New Profile Photo Preview -->
             <div class="mt-2" x-show="photoPreview" style="display: none;">
                 <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                       x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                 </span>
             </div>

             <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                 {{ __('เปลี่ยน') }}
             </x-jet-secondary-button>

             @if ($this->user->profile_photo_path)
                 <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                     {{ __('ลบ') }}
                 </x-jet-secondary-button>
             @endif

             <x-jet-input-error for="photo" class="mt-2" />
         </div>
     @endif  --}}

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('บันทึกเรียบร้อยแล้ว.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('บันทึก') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
