<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @method static create()
 * @property int $id
 * @property string $name
 * @property string|null $family
 * @property string $mobile
 * @property string|null $tell
 * @property string|null $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string $unique_code
 * @property int $city_id
 * @property string|null $addresses
 * @property int $user_type_id
 * @property string|null $user_unique_code
 * @property float $wallet
 * @property string|null $socialNetworks
 * @property int $level
 * @property string|null $pic
 * @property int $isActive
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $isMale
 * @property int $register_user_id
 * @property int $isDel
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Cart[] $carts
 * @property-read int|null $carts_count
 * @property-read \App\Models\City|null $city
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\GroupMember[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read User $registerUser
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @property-read \App\Models\UserType $userType
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddresses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFamily($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsMale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSocialNetworks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUniqueCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserUniqueCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereWallet($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Discount|null $discounts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Favorite> $favorites
 * @property-read int|null $favorites_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read int|null $orders_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @property-read int|null $rates_count
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Favorite> $favorites
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @mixin \Eloquent
 */
class User extends Authenticatable {
    use HasApiTokens, HasFactory, Notifiable , SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'family',
        'mobile',
        'tell',
        'email',
        'password',
        'unique_code',
        'addresses',
        'city_id',
        'user_type_id',
        'user_unique_code',
        'wallet',
        'socialNetworks',
        'level',
        'pic',
        'isActive',
        'isMale',
        'register_user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups() {
        return $this->hasMany(GroupMember::class);
    }

    public function favorites() {
        return $this->hasMany(Favorite::class)
            ->where('entity_type', 0);
    }

    public function discounts() {
        return $this->hasOne(Discount::class)->where('user_id', '>', 0);
    }

    public function getGender(): string {
        if ($this->isMale == 1) {
            return 'آقا';
        }

        return 'خانم';
    }

    public function getFullName(): string {
        return $this->name.' '.$this->family;
    }

    public function getCreatedAtAttribute($value)
    {
        return verta($value);
    }

    public function getCreatedAt() {
        $date = new Carbon($this->created_at);

        return verta($date);
    }

    public function city(): BelongsTo {
        return $this->belongsTo(City::class);
    }

    public function userType(): BelongsTo {
        return $this->belongsTo(UserType::class);
    }

    public function registerUser(): BelongsTo {
        return $this->belongsTo(User::class, 'register_user_id');
    }

    public function representativeUser(): BelongsTo {
        return $this->belongsTo(User::class, 'user_unique_code' , 'unique_code');
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function rates() {
        return $this->hasMany(ShopProductsRate::class, 'user_id');
    }

    public function activation(): string {
        if ($this->isActive == 1) {
            return 'غیرفعال کردن';
        }

        return 'فعال کردن';
    }

    public function getStatus(): string {
        if ($this->isActive == 1) {
            return 'فعال';
        }

        return 'غیرفعال';
    }

    public function isAdmin() {
        if ($this->user_type_id == 3) {
            return true;
        }

        return false;
    }
}
