<form action="{{ route('modify_home_landing', ['id_page' => $page->id_page]) }}" method="POST"
    enctype="multipart/form-data" autocomplete="off">

    @csrf
    <div class="Website_Page_Modification_Container">
        <div class="left_container">
            <div class="form_group">
                <legend class="form_legend">Intro Title</legend>
                <input type="text" name="Intro_title" value="{{ $HomeLandingPageItem->Intro_title }}"
                    class="styled_input">
            </div>

            <div class="form_group">
                <legend class="form_legend">Intro Paragraph 1</legend>
                <textarea name="Intro_paragraph_1" class="styled_input" id="textarea_parag_1">{{ $HomeLandingPageItem->Intro_paragraph_1 }}</textarea>
            </div>

            <div class="form_group">
                <legend class="form_legend">Intro Paragraph 2</legend>
                <textarea name="Intro_paragraph_2" class="styled_input" id="textarea_parag_2">{{ $HomeLandingPageItem->Intro_paragraph_2 }}</textarea>
            </div>

            <!-- Add more inputs as needed -->


            <div class="form_group">
                <legend class="form_legend">Button text</legend>
                <button class="custom-button" type="button"> <input name="Intro_button_text_1"
                        value="{{ $HomeLandingPageItem->Intro_button_text_1 }}"> </button>
            </div>

            <legend class="form_legend">Intro Images</legend>


            <div class="images_containers">
                <!-- Image Container 1 -->
                <div class="img-con">
                    <img id="img-1" src="{{ $HomeLandingPageItem->getIntroImage1URL() }}"
                        alt="Image 1">
                    <input type="file" id="file-input-1" name="intro_image_1"
                        accept="image/png, image/jpeg, image/gif">
                </div>

                <!-- Image Container 2 -->
                <div class="img-con">
                    <img id="img-2" src="{{ $HomeLandingPageItem->getIntroImage2URL() }}"
                        alt="Image 2">
                    <input type="file" id="file-input-2" name="intro_image_2"
                        accept="image/png, image/jpeg, image/gif">
                </div>
            </div>

            <div style="border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                {{-- just a line --}}
            </div>

            <legend class="form_legend" style="margin-bottom: 0;">Settings</legend>

            <div class="is_visible_con">
                <div class="toggle-container">
                    <label class="switch">
                        <input type="checkbox" name="is_visible"
                            {{ $HomeLandingPageItem->is_visible ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <span
                        class="toggle-label">{{ $HomeLandingPageItem->is_visible ? 'Visible' : 'Hidden' }}</span>
                </div>
                <p id="visible_description"> Disabling the toggle will hide the entire selected section
                </p>
                <p id="quick_note">
                    Note: The selected file size must not exceed
                    <span style="color: #f8f67a;">16MB</span>.
                </p>
            </div>

        </div>

        <div class="right_container">
            <img src="{{ asset('assets/res/Admin_Res/Website_Items/Web_Page.jpeg') }}" alt="page_info"
                draggable="false">
        </div>

    </div>

    <div class="Modifications_Options" id="mod-options">
        <!-- Back Button -->
        <a href="{{ route('modify_website') }}">
            <button class="mod-btn back-btn" type="button">
                <i class="fas fa-arrow-left"></i> Back
            </button>
        </a>
        <!-- Save Button -->
        <button class="mod-btn save-btn" type="submit">
            <i class="fas fa-save"></i> Save
        </button>
    </div>
</form>
