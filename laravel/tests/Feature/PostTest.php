<?php
 
namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Http\UploadedFile;
use App\Models\User;
use App\Models\Post;
use Laravel\Sanctum\Sanctum;
use Illuminate\Testing\Fluent\AssertableJson;

 
class PostTest extends TestCase
{

    public static User $testUser;
    public static array $validData = [];
    public static array $invalidData = [];
    
    public static function setUpBeforeClass() : void
    {
        parent::setUpBeforeClass();
        // Creem usuari/a de prova
        $name = "test_" . time();
        self::$testUser = new User([
            "name"      => "{$name}",
            "email"     => "{$name}@mailinator.com",
            "password"  => "12345678"
        ]);
        // Create fake file
        $name  = "avatar.png";
        $size = 500; /*KB*/
        $upload = UploadedFile::fake()->image($name)->size($size);
        // TODO Omplir amb dades vàlides
        self::$validData = [
            "upload" => $upload,
            'body'        => 'Soy marc',
            'latitude'    => '8',
            'longitude'   => '12',
            'visibility_id'   => '2',
        ];
        // TODO Omplir amb dades incorrectes
        self::$invalidData = [
            "upload" => $upload,
            'body'        => 38,
            'latitude'    => '8',
            'longitude'   => '5',
            'visibility_id'   => '2',
        ];
    }
 
    public function test_post_first()
    {
        // Desem l'usuari al primer test
        self::$testUser->save();
        // Comprovem que s'ha creat
        $this->assertDatabaseHas('users', [
            'email' => self::$testUser->email,
        ]);
    }

    public function test_post_list()
    {
        // List all files using API web service
        $response = $this->getJson("/api/posts");
        // Check OK response
        $this->_test_ok($response);
        // Check JSON dynamic values
        $response->assertJsonPath("data",
            fn ($data) => is_array($data)
        );
    }

    public function test_post_create() : object
    {
        Sanctum::actingAs(self::$testUser);
        // Llamar servicio API y revisar que no hay errores de validacion
        $response = $this->postJson("/api/posts", self::$validData);

        $params = array_keys(self::$validData);
        $response->assertValid($params);
                
        // Check OK response
        $this->_test_ok($response, 201);
    
        // Check JSON dynamic values
        $response->assertJsonPath("data.id",
            fn ($id) => !empty($id)
        );
        // Read, update and delete dependency!!!
        $json = $response->getData();
        return $json->data;
    }

    public function test_post_create_error()
    {
        Sanctum::actingAs(self::$testUser);
        // Llamar servicio API
        $response = $this->postJson("/api/posts", self::$invalidData);

        $params = [
            'body'
        ];
        $response->assertInvalid($params);
        
        // Check ERROR response
        $this->_test_error($response);
    }

    /**
     * @depends test_post_create
     */
    public function test_post_read(object $post)
    {
        // Read one file
        $response = $this->getJson("/api/posts/{$post->id}");
        // Check OK response
        $this->_test_ok($response);
       
    }

    public function test_post_read_notfound()
    {
        Sanctum::actingAs(self::$testUser);
        $id = "not_exists";
        $response = $this->getJson("/api/posts/{$id}");
        $this->_test_notfound($response);
    }

    /**
     * @depends test_post_create
     */

    public function test_post_update(object $post)
    {
        Sanctum::actingAs(self::$testUser);
        // Llamar servicio API y revisar que no hay errores de validacion
        $response = $this->putJson("/api/posts/{$post->id}", self::$validData);

        $params = array_keys(self::$validData);
        $response->assertValid($params);
                
        // Check OK response
        $this->_test_ok($response, 201);
    
        // Check JSON dynamic values
        $response->assertJsonPath("data.id",
            fn ($id) => !empty($id)
        );

        // Read, update and delete dependency!!!
        $json = $response->getData();
        return $json->data;
    }

    /**
     * @depends test_post_create
     */

    public function test_post_update_error(object $post)
    {
        Sanctum::actingAs(self::$testUser);
        // Llamar servicio API
        $response = $this->postJson("/api/posts", self::$invalidData);

        $params = [
            'body'
        ];
        $response->assertInvalid($params);
        // Check ERROR response
        $this->_test_error($response);
    }

    public function test_post_update_notfound()
    {
        Sanctum::actingAs(self::$testUser);
        $id = "not_exists";
        $response = $this->putJson("/api/posts/{$id}", []);
        $this->_test_notfound($response);
    }

    /**
     * @depends test_post_create
     */

    public function test_post_delete(object $post)
    {
        Sanctum::actingAs(self::$testUser);
        // Delete one file using API web service
        $response = $this->deleteJson("/api/posts/{$post->id}");
        // Check OK response
        $this->_test_ok($response);
    }

    /**
     * @depends test_post_create
     */

    public function test_post_delete_notfound()
    {
        Sanctum::actingAs(self::$testUser);
        $id = "not_exists";
        $response = $this->deleteJson("/api/posts/{$id}");
        $this->_test_notfound($response);
    }

    // MIRARLO EN DETALLE

    /*
    public function test_place_favorite(object $place)
    {
        Sanctum::actingAs(self::$testUser);
        $response = $this->postJson("/api/places/{$place->id}/favorite");
        // Check OK response
        $this->_test_ok($response);
        
    }

    public function test_place_favorite_error(object $place)
    {
        Sanctum::actingAs(self::$testUser);
        $response = $this->getJson("/api/places/{$place->id}/favorite");
        // Check ERROR response
        $this->_test_error($response);
        
    }

    public function test_place_unfavorite(object $place)
    {
        Sanctum::actingAs(self::$testUser);
        // Read one file
        $response = $this->getJson("/api/places/{$place->id}/favorite");
        // Check OK response
        $this->_test_ok($response);
        
    }

    public function test_place_unfavorite_error(object $place)
    {
        Sanctum::actingAs(self::$testUser);
        $response = $this->getJson("/api/places/{$place->id}/favorite");
        // Check ERROR response
        $this->_test_error($response);
        
    }

    */

    protected function _test_ok($response, $status = 200)
    {
        // Check JSON response
        $response->assertStatus($status);
        // Check JSON properties
        $response->assertJson([
            "success" => true,
            "data"    => true // any value
        ]);
    }
    
    protected function _test_error($response)
    {
        // Check response
        $response->assertStatus(422);
        // Check JSON properties
        $response->assertJson([
            "message" => true, // any value
            "errors"  => true, // any value
        ]);       
        // Check JSON dynamic values
        $response->assertJsonPath("message",
            fn ($message) => !empty($message) && is_string($message)
        );
        $response->assertJsonPath("errors",
            fn ($errors) => is_array($errors)
        );
    }
    
    protected function _test_notfound($response)
    {
        // Check JSON response
        $response->assertStatus(404);
        // Check JSON properties
        $response->assertJson([
            "success" => false,
            "message" => true // any value
        ]);
        // Check JSON dynamic values
        $response->assertJsonPath("message",
            fn ($message) => !empty($message) && is_string($message)
        );   
    }

    public function test_post_last()
    {
        // Eliminem l'usuari al darrer test
        self::$testUser->delete();
        // Comprovem que s'ha eliminat
        $this->assertDatabaseMissing('users', [
            'email' => self::$testUser->email,
        ]);
    }
    
}