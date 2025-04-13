<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\Website\HomeLandingS1Intro;
use App\Models\Website\HomeLandingS2Info;
use App\Models\Website\HomeLandingS3Idea;
use App\Models\Website\WebPageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class EditWebsiteController extends Controller
{
    public function edit_website_home_landing_page(Request $request, $id_page)
    {
        $page = WebPageModel::where('id_page', $id_page)->firstOrFail();
        $homeLandingItem = HomeLandingS1Intro::where('id_page', $id_page)->firstOrFail();

        // Update text fields
        $homeLandingItem->Intro_title = $request->input('Intro_title');
        $homeLandingItem->Intro_paragraph_1 = $request->input('Intro_paragraph_1');
        $homeLandingItem->Intro_paragraph_2 = $request->input('Intro_paragraph_2');
        $homeLandingItem->Intro_button_text_1 = $request->input('Intro_button_text_1');
        $homeLandingItem->is_visible = $request->has('is_visible');


        // Handle intro_image_1
        if ($request->hasFile('intro_image_1')) {
            $file = $request->file('intro_image_1');

            // Optional: Check file size limit (16MB)
            if ($file->getSize() <= 16384 * 1024) {
                // Delete old image if exists
                if ($homeLandingItem->intro_image_1 && Storage::disk('private')->exists('website_elements/home_landing/' . $homeLandingItem->intro_image_1)) {
                    Storage::disk('private')->delete('website_elements/home_landing/' . $homeLandingItem->intro_image_1);
                }

                // Store new image with unique name
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('website_elements/home_landing', $filename, 'private');
                $homeLandingItem->intro_image_1 = $filename;
            }
        }

        // Handle intro_image_2
        if ($request->hasFile('intro_image_2')) {
            $file = $request->file('intro_image_2');

            // Optional: Check file size limit (16MB)
            if ($file->getSize() <= 16384 * 1024) {
                // Delete old image if exists
                if ($homeLandingItem->intro_image_2 && Storage::disk('private')->exists('website_elements/home_landing/' . $homeLandingItem->intro_image_2)) {
                    Storage::disk('private')->delete('website_elements/home_landing/' . $homeLandingItem->intro_image_2);
                }

                // Store new image with unique name
                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('website_elements/home_landing', $filename, 'private');
                $homeLandingItem->intro_image_2 = $filename;
            }
        }

        // Save the updated record
        $homeLandingItem->save();

        return redirect()->route('modify_home_landing', ['id_page' => $id_page])->with('success', 'Page updated successfully.');
    }


    public function edit_website_home_landing_page_s2(Request $request, $id_page)
    {
        $page = WebPageModel::where('id_page', $id_page)->firstOrFail();
        $homeLandingItem = HomeLandingS2Info::where('id_page', $id_page)->firstOrFail();

        // Assign basic fields
        $homeLandingItem->Mega_Title = $request->input('Mega_Title');
        $homeLandingItem->mini_title_left_1 = $request->input('mini_title_left_1');
        $homeLandingItem->mini_desc_left_1 = $request->input('mini_desc_left_1');
        $homeLandingItem->mini_title_middle_2 = $request->input('mini_title_middle_2');
        $homeLandingItem->mini_desc_middle_2 = $request->input('mini_desc_middle_2');
        $homeLandingItem->mini_title_right_3 = $request->input('mini_title_right_3');
        $homeLandingItem->mini_desc_right_3 = $request->input('mini_desc_right_3');

        // Handle image_left_1
        if ($request->hasFile('img_left_1')) {
            $file = $request->file('img_left_1');

            if ($file->getSize() <= 16384 * 1024) {
                if ($homeLandingItem->img_left_1 && Storage::disk('private')->exists('website_elements/home_landing/' . $homeLandingItem->img_left_1)) {
                    Storage::disk('private')->delete('website_elements/home_landing/' . $homeLandingItem->img_left_1);
                }

                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('website_elements/home_landing', $filename, 'private');
                $homeLandingItem->img_left_1 = $filename;
            }
        }

        // Handle image_middle_2
        if ($request->hasFile('img_middle_2')) {
            $file = $request->file('img_middle_2');

            if ($file->getSize() <= 16384 * 1024) {
                if ($homeLandingItem->img_middle_2 && Storage::disk('private')->exists('website_elements/home_landing/' . $homeLandingItem->img_middle_2)) {
                    Storage::disk('private')->delete('website_elements/home_landing/' . $homeLandingItem->img_middle_2);
                }

                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('website_elements/home_landing', $filename, 'private');
                $homeLandingItem->img_middle_2 = $filename;
            }
        }

        // Handle image_right_3
        if ($request->hasFile('img_right_3')) {
            $file = $request->file('img_right_3');

            if ($file->getSize() <= 16384 * 1024) {
                if ($homeLandingItem->img_right_3 && Storage::disk('private')->exists('website_elements/home_landing/' . $homeLandingItem->img_right_3)) {
                    Storage::disk('private')->delete('website_elements/home_landing/' . $homeLandingItem->img_right_3);
                }

                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('website_elements/home_landing', $filename, 'private');
                $homeLandingItem->img_right_3 = $filename;
            }
        }

        // Handle visibility toggle
        $homeLandingItem->is_visible = $request->has('is_visible') ? 1 : 0;

        // Save the updated record
        $homeLandingItem->save();

        return redirect()->route('modify_home_landing', ['id_page' => $id_page])
            ->with('success', 'Page updated successfully.');
    }


    public function edit_website_home_landing_page_s3(Request $request, $id_page)
    {
        $page = WebPageModel::where('id_page', $id_page)->firstOrFail();
        $homeLandingIdea = HomeLandingS3Idea::where('id_page', $id_page)->firstOrFail();

        // Assign basic fields
        $homeLandingIdea->Idea_title = $request->input('Idea_title');
        $homeLandingIdea->Idea_desc = $request->input('Idea_desc');

        // Handle Idea image
        if ($request->hasFile('Idea_img')) {
            $file = $request->file('Idea_img');

            if ($file->getSize() <= 16384 * 1024) {
                if ($homeLandingIdea->Idea_img && Storage::disk('private')->exists('website_elements/home_landing/' . $homeLandingIdea->Idea_img)) {
                    Storage::disk('private')->delete('website_elements/home_landing/' . $homeLandingIdea->Idea_img);
                }

                $filename = uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('website_elements/home_landing', $filename, 'private');
                $homeLandingIdea->Idea_img = $filename;
            }
        }

        $homeLandingIdea->is_visible = $request->has('is_visible') ? 1 : 0;

        // Save the updated record
        $homeLandingIdea->save();

        return redirect()->route('modify_home_landing', ['id_page' => $id_page])
            ->with('success', 'Page updated successfully.');
    }
}
