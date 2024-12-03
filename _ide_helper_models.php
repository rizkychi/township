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
 * App\Models\Ads
 *
 * @property int $id
 * @property string|null $image
 * @property string|null $url
 * @property string $position
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads wherePosition($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ads whereUrl($value)
 */
	class Ads extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Anggota
 *
 * @property int $id
 * @property string $id_lokal
 * @property string $nama
 * @property string|null $kode_reg
 * @property string|null $tempat_lahir
 * @property string|null $tgl_lahir
 * @property string|null $no_hp
 * @property string|null $alamat
 * @property string|null $kendaraan_jenis
 * @property string|null $kendaraan_warna
 * @property string|null $kendaraan_nopol
 * @property string|null $kendaraan_tahun
 * @property string|null $tgl_reg_tksci
 * @property string|null $status
 * @property string|null $keterangan
 * @property string|null $avatar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $status_label
 * @property-read mixed $status_label_color
 * @property-read mixed $status_label_html
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereIdLokal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKendaraanJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKendaraanNopol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKendaraanTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKendaraanWarna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKodeReg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereTglRegTksci($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereUpdatedAt($value)
 */
	class Anggota extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Banner
 *
 * @property int $id
 * @property string $image
 * @property int|null $order
 * @property bool $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Banner whereUpdatedAt($value)
 */
	class Banner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Content
 *
 * @property int $id
 * @property string $title
 * @property string $desc
 * @property string $topic
 * @property string|null $thumbnail
 * @property string $url
 * @property int $views
 * @property bool $published
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $tanggal
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content wherePublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereThumbnail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTopic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereViews($value)
 */
	class Content extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\EnrollStatus
 *
 * @method static \Illuminate\Database\Eloquent\Builder|EnrollStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnrollStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EnrollStatus query()
 */
	class EnrollStatus extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Enrollment
 *
 * @property int $id
 * @property int|null $anggota_id
 * @property string $nama
 * @property string|null $tempat_lahir
 * @property string|null $tgl_lahir
 * @property string|null $no_hp
 * @property string|null $alamat
 * @property string|null $kendaraan_jenis
 * @property string|null $kendaraan_warna
 * @property string|null $kendaraan_nopol
 * @property string|null $kendaraan_tahun
 * @property string|null $status
 * @property string|null $file_stnk
 * @property string|null $file_sim
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $status_label
 * @property-read mixed $status_label_color
 * @property-read mixed $status_label_html
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereAnggotaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereFileSim($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereFileStnk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereKendaraanJenis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereKendaraanNopol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereKendaraanTahun($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereKendaraanWarna($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereNoHp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereTglLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Enrollment whereUpdatedAt($value)
 */
	class Enrollment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Status
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Status newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Status query()
 */
	class Status extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Topic
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 */
	class Topic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUsername($value)
 */
	class User extends \Eloquent {}
}

