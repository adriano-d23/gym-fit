<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'address_id', 'birth_date', 'gender', 'cpf', 'phone', 'email', 'password', 'user_group_id', 'active'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relacionamento com a tabela de endereços (Address).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    /**
     * Relacionamento com a tabela de grupos de usuários (UserGroup).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userGroup()
    {
        return $this->belongsTo(UserGroup::class, 'user_group_id');
    }

    /**
    * Retorna apenas os usuários que são administradores ou proprietários.
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
   public static function getAdminsAndProprietarios()
   {
       $adminGroupId = DB::table('user_groups')->where('name', 'Administrator')->value('id');
       $proprietarioGroupId = DB::table('user_groups')->where('name', 'Proprietário')->value('id');

       return self::whereIn('user_group_id', [$adminGroupId, $proprietarioGroupId]);
   }


}


