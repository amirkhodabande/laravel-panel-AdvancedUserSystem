<?php

namespace Tests\Feature;

use App\Upload;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;

class UploadsTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_upload_an_image()
    {
        $this->withoutExceptionHandling();

        // We must logged in as an admin so we will do it
        // instead of copy the code for login in every single function we cut it into 'testcase' .....
        $this->loginAdmin();

        Storage::fake(config('filesystems.default'));
        $this->post('/admin/uploads', [
            'title' => 'عکس جدید 1',
            'upload_type' => 'image',
            'url' => UploadedFile::fake()->image(Str::slug('عکس جدید 1') . '.png'),
            // slug => will convert title to 'aaks-gdyd-1.png' ...
        ])->assertStatus(200);

        Storage::disk(config('filesystems.default'))
            ->assertExists('public/uploads/' . Str::slug('عکس جدید 1') . '.png');

        $this->assertDatabaseHas('uploads', [
            'title' => 'عکس جدید 1'
        ]);
    }

    public function test_only_administrators_can_delete_a_file()
    {
        // create user
        $this->actingAs(
            // the reporters cant delete an uploaded file.
            factory(User::class)->create(['user_type' => 'reporter'])
        );
        $img = factory(Upload::class)->create();
        // dd($img);
        $this->deleteJson("admin/uploads/{$img->id}")
            ->assertStatus(200)
            ->assertSee('متاسفانه');
    }
}
