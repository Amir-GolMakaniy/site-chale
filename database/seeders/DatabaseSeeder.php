<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
	/**
	 * Seed the application's database.
	 */
	public function run(): void
	{
		$admin = User::factory()->create([
			'name' => 'Test User',
			'email' => 'test@example.com',
		]);

		$editor = User::factory()->create([
			'name' => 'Amir GolMakani',
			'email' => 'amir.golmakani@gmail.com',
		]);

		$permissions = [
			'create article',
			'edit articles',
			'delete articles',
		];

		foreach ($permissions as $perm) {
			Permission::create(['name' => $perm]);
		}

		$adminRol = Role::create(['name' => 'admin']);
		$adminRol->givePermissionTo(Permission::all());

		$editorRol = Role::create(['name' => 'editor']);
		$editorRol->givePermissionTo(['create article', 'edit articles']);

		$admin->assignRole('admin');
		$editor->assignRole('editor');

//		Article::factory(10)->create();
		Tag::factory(10)->create();
	}
}
