<?php

namespace App\Enums;

enum UserRole: string
{
    case ADMIN = 'admin';
    case GURU = 'guru';
    case SISWA = 'siswa';
}