<div class="t_search">
    <x-forms.form
        title=""
        subtitle=""
        action="{{ route('home') }}"
        method="POST"
    >
        <div class="slotButtons slotButtons__right">
            <div class=" text_input">
                <x-forms.primary-button>
                </x-forms.primary-button>
            </div>
        </div>
        <div class="text_input">
            <x-forms.text-input
                type="text"
                id="searchSearch"
                name="search"
                placeholder="Поиск по организациям"
                value=""
                class="input search"
                required="true"
                :isError="$errors->has('search')"
            />
            <x-forms.error class="error_search"/>

        </div>




    </x-forms.form>

</div>
