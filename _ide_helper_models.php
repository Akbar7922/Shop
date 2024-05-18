<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\AboutUs
 *
 * @property int $id
 * @property string|null $title
 * @property string $body
 * @property string|null $images
 * @property string|null $videoes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs query()
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AboutUs whereVideoes($value)
 * @mixin \Eloquent
 */
	class AboutUs extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Activity
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity query()
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Activity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Activity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Advertising
 *
 * @property int $id
 * @property string $title
 * @property string $pic
 * @property string $link
 * @property string $start_date
 * @property string $end_date
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising query()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Advertising withoutTrashed()
 * @mixin \Eloquent
 */
	class Advertising extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Brand
 *
 * @property int $id
 * @property string $name
 * @property int $parent_brand_id
 * @property string|null $color
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereParentBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Brand $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Brand findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand withoutTrashed()
 * @mixin \Eloquent
 */
	class Brand extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CallInformation
 *
 * @property int $id
 * @property string $full_name
 * @property string|null $tell
 * @property string $mobile
 * @property string|null $email
 * @property string|null $address
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation query()
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CallInformation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class CallInformation extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cart
 *
 * @property int $id
 * @property int $user_id
 * @property int $shop_product_id
 * @property int $count
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereUserId($value)
 * @property int $discount_id
 * @property-read \App\Models\Discount|null $discount
 * @method static \Illuminate\Database\Eloquent\Builder|Cart whereDiscountId($value)
 * @mixin \Eloquent
 */
	final class Cart extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @property int $parent_cat_id
 * @property string|null $color
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @property-read \Illuminate\Database\Eloquent\Collection|Category[] $children
 * @property-read int|null $children_count
 * @property-read Category $parent
 * @method static \Illuminate\Database\Eloquent\Builder|Category findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereParentCatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Category onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Category withoutTrashed()
 * @mixin \Eloquent
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\City
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|City[] $children
 * @property-read int|null $children_count
 * @property-read City $parent
 * @method static \Illuminate\Database\Eloquent\Builder|City newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|City query()
 * @method static \Illuminate\Database\Eloquent\Builder|City whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|City whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class City extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Comment
 *
 * @property int $id
 * @property int $user_id
 * @property int $shop_product_id
 * @property int $comment_parent_id
 * @property string $comment
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCommentParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read Comment $parent
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Comment onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Comment withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Comment withoutTrashed()
 * @mixin \Eloquent
 */
	class Comment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CommentsLike
 *
 * @property int $id
 * @property int $comment_id
 * @property int $user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike query()
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereCommentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CommentsLike whereUserId($value)
 * @mixin \Eloquent
 */
	class CommentsLike extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Condition
 *
 * @property int $id
 * @property int $job_id
 * @property string $text
 * @property int $type
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Job|null $job
 * @method static \Illuminate\Database\Eloquent\Builder|Condition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Condition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Condition query()
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Condition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Condition extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Config
 *
 * @property int $id
 * @property string $app_name
 * @property string $small_logo
 * @property string|null $large_logo
 * @property string|null $placeholder
 * @property string|null $main_color
 * @property string|null $tell
 * @property string $mobile
 * @property string $email
 * @property string|null $address
 * @property string|null $slogan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Config newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Config query()
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereAppName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereLargeLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereMainColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config wherePlaceholder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereSmallLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereSlogan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Config whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Config extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CooperationRequest
 *
 * @property int $id
 * @property int $city_id
 * @property int $job_id
 * @property int $is_male
 * @property string $national_code
 * @property string|null $birthday_year
 * @property string $fullName
 * @property int $is_married
 * @property int $degreeOfEducation
 * @property string $fieldOfStudy
 * @property string $university_name
 * @property string $tell
 * @property string $mobile
 * @property string $address
 * @property string|null $description
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property string $tracking_code
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\Job|null $job
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest query()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereBirthdayYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereDegreeOfEducation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereFieldOfStudy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereFullName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereIsMale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereIsMarried($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereJobId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereUniversityName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|CooperationRequest withoutTrashed()
 * @mixin \Eloquent
 */
	class CooperationRequest extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Discount
 *
 * @property int $id
 * @property int $shop_id
 * @property int $shop_product_id
 * @property int $category_id
 * @property int $brand_id
 * @property float $discount_price
 * @property float $discount_percentage
 * @property int $user_id
 * @property int $group_id
 * @property string $start_date
 * @property string $end_date
 * @property string $discount_code
 * @property int $isActive
 * @property int $register_user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount query()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDiscountCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDiscountPercentage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDiscountPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\Group|null $group
 * @property-read \App\Models\Shop|null $shop
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Discount onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Discount withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Discount withoutTrashed()
 * @mixin \Eloquent
 * @property-read \App\Models\User $userRegister
 */
	class Discount extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property string $event_date
 * @property int $type
 * @property string $pic
 * @property string|null $video
 * @property string|null $pictures
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEventDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Event withoutTrashed()
 * @mixin \Eloquent
 */
	class Event extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Favorite
 *
 * @property int $id
 * @property int $shop_product_id
 * @property int $category_id
 * @property int $brand_id
 * @property int $entity_type
 * @property int $user_id
 * @property int $register_user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite query()
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereEntityType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Favorite whereUserId($value)
 * @mixin \Eloquent
 */
	class Favorite extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ForPayments
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments query()
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ForPayments whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ForPayments extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Gallery
 *
 * @property int $id
 * @property string $title
 * @property string $pics
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery query()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery wherePics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Gallery withoutTrashed()
 * @mixin \Eloquent
 */
	class Gallery extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $unique_name
 * @property int $isGroup
 * @property string $pic
 * @property int $register_user_id
 * @property int $isActive
 * @property int $isDel
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUniqueName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GroupMember> $members
 * @property-read int|null $members_count
 * @method static \Illuminate\Database\Eloquent\Builder|Group onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Group withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GroupMember> $members
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\GroupMember> $members
 */
	class Group extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\GroupMember
 *
 * @property int $id
 * @property int $group_id
 * @property int $user_id
 * @property int $isAdmin
 * @property int $isActive
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Group|null $group
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereUserId($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupMember withoutTrashed()
 * @mixin \Eloquent
 */
	class GroupMember extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Installment
 *
 * @property int $id
 * @property float $price
 * @property int $order_id
 * @property string $due_date
 * @property int $status
 * @property int $transaction_id
 * @property string $barcode
 * @property string $description
 * @property int $register_user_id
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Transaction|null $transaction
 * @method static \Illuminate\Database\Eloquent\Builder|Installment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Installment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Installment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Installment whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Installment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Job
 *
 * @property int $id
 * @property string $name
 * @property int $city_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\City|null $city
 * @method static \Illuminate\Database\Eloquent\Builder|Job newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Job onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job query()
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Job withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Job withoutTrashed()
 * @mixin \Eloquent
 */
	class Job extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Log
 *
 * @property int $id
 * @property int $activity_id
 * @property int $user_id
 * @property string $ip_address
 * @property int $platform
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Log newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Log query()
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereActivityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log wherePlatform($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereUserId($value)
 * @property int $entity_id
 * @property-read \App\Models\Activity $activity
 * @property-read \App\Models\ShopProduct|null $shopProductEntity
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Log whereEntityId($value)
 * @mixin \Eloquent
 */
	class Log extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\LoginAttempt
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $ip_address
 * @property string|null $mac_address
 * @property string|null $imei
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt query()
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereImei($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LoginAttempt whereUsername($value)
 * @mixin \Eloquent
 */
	class LoginAttempt extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Message
 *
 * @property int $id
 * @property string $body
 * @property int $sender_user_id
 * @property int $reciver_user_id
 * @property int $receiver_type
 * @property int $message_parent_id
 * @property int $message_type
 * @property int $isNotification
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereIsNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereMessageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReceiverType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereReciverUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereSenderUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Message extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MessageStatus
 *
 * @property int $id
 * @property string $name
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessageStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class MessageStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\MessagesLog
 *
 * @property int $id
 * @property int $message_id
 * @property int $user_id
 * @property int $message_status_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereMessageStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|MessagesLog whereUserId($value)
 * @mixin \Eloquent
 */
	class MessagesLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Messenger
 *
 * @property int $id
 * @property int $driver_user_id
 * @property string $car
 * @property string $engine_number
 * @property int $car_type
 * @property string $plates_number
 * @property string $driver_nationalCode
 * @property string $end_insurance_date
 * @property string $end_exam_date
 * @property string $color
 * @property int $status
 * @property string $start_contract_date
 * @property string $end_contract_date
 * @property string $driver_pic
 * @property string $contract_file
 * @property string $insurance_file
 * @property string $exam_file
 * @property string $card_file
 * @property int $isActive
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger query()
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCarType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCardFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereContractFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereDriverNationalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereDriverPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereDriverUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEndContractDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEndExamDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEndInsuranceDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereEngineNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereExamFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereInsuranceFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger wherePlatesNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereStartContractDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Messenger whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Messenger extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Order
 *
 * @property int $id
 * @property int $user_id
 * @property float $price
 * @property float $send_price
 * @property int $send_type_id
 * @property int $pay_type_id
 * @property string $tracking_code
 * @property string $address
 * @property float $latitude
 * @property float $longitude
 * @property int $status_id
 * @property int $payment_status
 * @property int $isActive
 * @property int $register_user_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $city_id
 * @property int|null $transaction_id
 * @property int $installments
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\PayType $payType
 * @property-read \App\Models\SendType $sendType
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShopOrder[] $shopOrder
 * @property-read int|null $shop_order_count
 * @property-read \App\Models\OrderStatus $status
 * @property-read \App\Models\Transaction|null $transaction
 * @method static \Illuminate\Database\Eloquent\Builder|Order newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Order query()
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereInstallments($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLatitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereLongitude($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePayTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePaymentStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSendPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereSendTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereTransactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Order whereUserId($value)
 * @property-read \App\Models\Status|null $paymentStatus
 * @property-read \App\Models\User|null $user
 * @mixin \Eloquent
 */
	class Order extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderStatus
 *
 * @property int $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class OrderStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\OrderStatusLog
 *
 * @property int $id
 * @property int $order_id
 * @property int $order_status_id
 * @property int $register_user_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog query()
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OrderStatusLog whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class OrderStatusLog extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PayType
 *
 * @property int $id
 * @property string $name
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $icon
 * @method static \Illuminate\Database\Eloquent\Builder|PayType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayType query()
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PayType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $name
 * @property string|null $en_name
 * @property int $category_id
 * @property string $barcode
 * @property string|null $pic
 * @property string|null $description
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $isDel
 * @property string $slug
 * @property-read \App\Models\Category|null $category
 * @method static \Illuminate\Database\Eloquent\Builder|Product findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereEnName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @mixin \Eloquent
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Project
 *
 * @property int $id
 * @property string $title
 * @property string|null $description
 * @property string $pic
 * @property string|null $video
 * @property string|null $pictures
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Project newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Project onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project query()
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Project withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Project withoutTrashed()
 * @mixin \Eloquent
 */
	class Project extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Property
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Property newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Property query()
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Property whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Property extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SearchHistory
 *
 * @property int $id
 * @property int $user_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SearchHistory whereUserId($value)
 * @mixin \Eloquent
 */
	class SearchHistory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SendActivationCode
 *
 * @property int $id
 * @property string $activation_code
 * @property string $mobile
 * @property int $message_type
 * @property int $send_status
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereActivationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereMessageType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereMobile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereSendStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendActivationCode whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SendActivationCode extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SendOrder
 *
 * @property int $id
 * @property int $order_id
 * @property int $messenger_id
 * @property float $send_price
 * @property string $send_date
 * @property string $receive_date
 * @property int $order_status_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereMessengerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereOrderStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereReceiveDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereSendDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereSendPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SendOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\SendType
 *
 * @property int $id
 * @property string $name
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property float $base_cost
 * @method static \Illuminate\Database\Eloquent\Builder|SendType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SendType query()
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereBaseCost($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SendType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class SendType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Setting
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting query()
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Setting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Setting extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Shop
 *
 * @property int $id
 * @property int $manager_user_id
 * @property string $name
 * @property string $manager_moblie
 * @property string $manager_natoinalCode
 * @property int $category_id
 * @property string $tell
 * @property string $city_id
 * @property string $addresses
 * @property int $main_shop_id
 * @property string $hoursOfWork
 * @property int $isOpen
 * @property int $isActive
 * @property string|null $logo
 * @property int $shopType
 * @property string|null $license
 * @property string $contract
 * @property string $start_contract_date
 * @property string $end_contract_date
 * @property string|null $manager_pic
 * @property int $register_user_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $isDel
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop query()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereAddresses($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereEndContractDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereHoursOfWork($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereIsOpen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereLicense($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereMainShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereManagerMoblie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereManagerNatoinalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereManagerPic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereManagerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereShopType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereStartContractDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereTell($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereCityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereUpdatedAt($value)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Category|null $category
 * @property-read Shop $center
 * @property-read \App\Models\City|null $city
 * @property-read \App\Models\User $manager
 * @method static \Illuminate\Database\Eloquent\Builder|Shop onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Shop withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Shop withoutTrashed()
 * @mixin \Eloquent
 */
	class Shop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShopOrder
 *
 * @property int $id
 * @property int $shop_id
 * @property float $price
 * @property int $middleMan_id
 * @property int $status_id
 * @property int $order_id
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\Shop|null $shop
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShopOrderProduct[] $shopOrderProducts
 * @property-read int|null $shop_order_products_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereMiddleManId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrder whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ShopOrder extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShopOrderProduct
 *
 * @property int $id
 * @property int $shop_order_id
 * @property int $shop_product_id
 * @property float $price
 * @property int $count
 * @property int $discount_id
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User $registerUser
 * @property-read \App\Models\ShopOrder|null $shopOrder
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereDiscountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereShopOrderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereUpdatedAt($value)
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopOrderProduct withoutTrashed()
 * @mixin \Eloquent
 */
	class ShopOrderProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShopProduct
 *
 * @property int $id
 * @property int $product_id
 * @property int $shop_id
 * @property int $brand_id
 * @property int $count
 * @property float $price
 * @property float|null $discounted_price
 * @property int $unit_id
 * @property string|null $company
 * @property int $isProduct
 * @property string $pictures
 * @property int $register_user_id
 * @property int $isDel
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $slug
 * @property string $barcode
 * @property string|null $description
 * @property-read \App\Models\Brand|null $brand
 * @property-read \App\Models\Favorite|null $is_Favorite
 * @property-read \App\Models\Cart|null $is_inCart
 * @property-read \App\Models\Product|null $product
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ShopProductProperty[] $properties
 * @property-read int|null $properties_count
 * @property-read \App\Models\Shop|null $shop
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct findSimilarSlugs(string $attribute, array $config, string $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereBarcode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereBrandId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereCompany($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereDiscountedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereIsDel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereIsProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct wherePictures($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereUnitId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct withUniqueSlugConstraints(\Illuminate\Database\Eloquent\Model $model, string $attribute, array $config, string $slug)
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Discount|null $discounts
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @property-read int|null $rates_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopOrderProduct> $sales
 * @property-read int|null $sales_count
 * @property-read \App\Models\Unit $unit
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Log> $visits
 * @property-read int|null $visits_count
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProduct withoutTrashed()
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopOrderProduct> $sales
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Log> $visits
 * @mixin \Eloquent
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopOrderProduct> $sales
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Log> $visits
 */
	class ShopProduct extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShopProductProperty
 *
 * @property int $id
 * @property int $shop_product_id
 * @property int $property_id
 * @property string $value
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Property $property
 * @property-read \App\Models\ShopProduct|null $shopProduct
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty wherePropertyId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductProperty whereValue($value)
 * @mixin \Eloquent
 */
	class ShopProductProperty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ShopProductsRate
 *
 * @property int $id
 * @property int $user_id
 * @property int $shop_product_id
 * @property float $rate
 * @property string|null $comment
 * @property int $isActive
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereComment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereShopProductId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopProductsRate whereUserId($value)
 * @mixin \Eloquent
 */
	class ShopProductsRate extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Status whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property string $title
 * @property int $section
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereSection($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUpdatedAt($value)
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket withoutTrashed()
 * @mixin \Eloquent
 * @property string $tracking_code
 * @property int $receiver_id
 * @property-read \App\Models\User|null $receiver
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereReceiverId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ticket whereTrackingCode($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\TicketMessage
 *
 * @property int $id
 * @property int $ticket_id
 * @property int $user_id
 * @property string $body
 * @property string|null $files
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereBody($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereFiles($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereTicketId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage whereUserId($value)
 * @mixin \Eloquent
 * @property-read \App\Models\Ticket|null $ticket
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TicketMessage withoutTrashed()
 */
	class TicketMessage extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Transaction
 *
 * @property int $id
 * @property float $price
 * @property string $reference_code
 * @property int|null $status_code
 * @property string|null $status_text
 * @property string|null $referenceID
 * @property int $status_id
 * @property int $register_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $for_payments_id
 * @property string $trackingCode
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Status $status
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transaction onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereForPaymentsId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReferenceCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereReferenceID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereRegisterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatusCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereStatusText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Transaction withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transaction withoutTrashed()
 * @property int $order_id
 * @method static \Illuminate\Database\Eloquent\Builder|Transaction whereOrderId($value)
 * @mixin \Eloquent
 */
	class Transaction extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Unit
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit query()
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Unit whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Unit extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Favorite> $favorites
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Order> $orders
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\ShopProductsRate> $rates
 * @property-read User|null $representativeUser
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserDevice
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $mac_address
 * @property string $IMEI
 * @property string $unique_device_id
 * @property string $android_version
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereAndroidVersion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereIMEI($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereMacAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereUniqueDeviceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDevice whereUserId($value)
 * @mixin \Eloquent
 */
	class UserDevice extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\UserType
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class UserType extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Video
 *
 * @property int $id
 * @property string $title
 * @property string $video
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|Video newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Video onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Video query()
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video whereVideo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Video withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Video withoutTrashed()
 * @mixin \Eloquent
 */
	class Video extends \Eloquent {}
}

