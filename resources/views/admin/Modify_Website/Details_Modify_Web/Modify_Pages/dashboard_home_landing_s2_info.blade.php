<form action="{{ route('modify_home_landing_S2', ['id_page' => $page->id_page]) }}" method="POST" enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="Website_Page_Modification_Container">
        <div class="left_container">
            <div class="form_group">
                <legend class="form_legend">Mega Title</legend>
                <input type="text" name="Mega_Title" value="{{ $HomeLandingPageInfo->Mega_Title }}"
                    class="styled_input">
            </div>

            <div class="section2_images_and_info">

                <div class="left">
                    <input type="text" id="mini_title" name="mini_title_left_1"
                        value="{{ $HomeLandingPageInfo->mini_title_left_1 }}">

                    <div class="image-upload">
                        <label for="image_left">
                            <img id="preview_left"
                                src="{{ $HomeLandingPageInfo->getLeftInfoImage1() ?: asset('default-image.png') }}"
                                alt="Select Image">
                        </label>
                        <input type="file" id="image_left" name="img_left_1" accept="image/*"
                            style="display: none;">
                    </div>

                    <textarea class="mini-textarea" name="mini_desc_left_1">{{ $HomeLandingPageInfo->mini_desc_left_1 }}</textarea>
                </div>

                <div class="middle">
                    <input type="text" id="mini_title" name="mini_title_middle_2"
                        value="{{ $HomeLandingPageInfo->mini_title_middle_2 }}">

                    <div class="image-upload">
                        <label for="image_middle">
                            <img id="preview_middle"
                                src="{{ $HomeLandingPageInfo->getMiddleInfoImage2() ?: asset('default-image.png') }}"
                                alt="Select Image">
                        </label>
                        <input type="file" id="image_middle" name="img_middle_2" accept="image/*"
                            style="display: none;">
                    </div>

                    <textarea class="mini-textarea" name="mini_desc_middle_2">{{ $HomeLandingPageInfo->mini_desc_middle_2 }}</textarea>
                </div>

                <div class="right">
                    <input type="text" id="mini_title" name="mini_title_right_3"
                        value="{{ $HomeLandingPageInfo->mini_title_right_3 }}">

                    <div class="image-upload">
                        <label for="image_right">
                            <img id="preview_right"
                                src="{{ $HomeLandingPageInfo->getRightInfoImage3() ?: asset('default-image.png') }}"
                                alt="Select Image">
                        </label>
                        <input type="file" id="image_right" name="img_right_3" accept="image/*"
                            style="display: none;">
                    </div>

                    <textarea class="mini-textarea" name="mini_desc_right_3">{{ $HomeLandingPageInfo->mini_desc_right_3 }}</textarea>
                </div>

            </div>

            <div style="border-bottom: 1px solid rgba(255, 255, 255, 0.1);">
                {{-- just a line --}}
            </div>





            <div class="is_visible_con">
                <div class="toggle-container">
                    <label class="switch">
                        <input type="checkbox" name="is_visible"
                            {{ $HomeLandingPageInfo->is_visible ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <span class="toggle-label">{{ $HomeLandingPageInfo->is_visible ? 'Visible' : 'Hidden' }}</span>
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
            <img src="{{ asset('assets/res/Admin_Res/Website_Items/Edit_Web_Img_1.png') }}" alt="page_info"
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
