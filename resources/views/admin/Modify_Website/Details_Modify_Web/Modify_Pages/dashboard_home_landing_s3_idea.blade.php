<form action="{{ route('modify_home_landing_S3', ['id_page' => $page->id_page]) }}" method="POST"
    enctype="multipart/form-data" autocomplete="off">
    @csrf
    <div class="Website_Page_Modification_Container">
        <div class="left_container">
            <div class="form_group">
                <legend class="form_legend">Idea Title</legend>
                <input type="text" name="Idea_title" value="{{ $HomeLandingPageIdea->Idea_title }}"
                    class="styled_input">
            </div>


            <div class="form_group">
                <legend class="form_legend">Idea description</legend>
                <textarea name="Idea_desc" class="styled_input" id="textarea_idea">{{ $HomeLandingPageIdea->Idea_desc }}</textarea>
            </div>

            <legend class="form_legend">Intro Images</legend>

            <div class="idea_img_container">
                <input type="file" id="idea_img_input" name="Idea_img" accept="image/*" hidden>
                <img src="{{ $HomeLandingPageIdea->getIdeaImage() }}" id="idea_img_preview" alt="Select Image">
            </div>








            <div class="is_visible_con">
                <div class="toggle-container">
                    <label class="switch">
                        <input type="checkbox" name="is_visible"
                            {{ $HomeLandingPageIdea->is_visible ? 'checked' : '' }}>
                        <span class="slider round"></span>
                    </label>
                    <span class="toggle-label">{{ $HomeLandingPageIdea->is_visible ? 'Visible' : 'Hidden' }}</span>
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
