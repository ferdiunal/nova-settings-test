<?php

namespace App\NovaSettings;

use App\Settings\General;
use Ferdiunal\NovaSettings\SettingResource;
use Laravel\Nova\Fields\Image;

class GeneralSettingsResource extends SettingResource
{
    /**
     * The settings class that this resource corresponds to.
     * @return class-string<\App\Settings\General>
     */
    public static function settings(): string
    {
        return General::class;
    }

    /**
     * The title for the setting resource.
     *
     * @return string
     */
    public static function title(): string
    {
        return 'GeneralSettingsResource';
    }

    /**
     * The description for the setting resource.
     *
     * @return string
     */
    public static function description(): string
    {
        return 'Simplicity is the consequence of refined emotions. - Jean D\'Alembert';
    }

    /**
     * The order of the setting resource.
     *
     * @return int
     */
    public static function order(): int
    {
        return 0;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public static function fields(): array
    {
        return [
            Image::make('Logo', 'logo')
                ->displayUsing(fn ($value) => $value ? asset('storage/' . $value) : null)
                ->storeAs(
                    fn ($request) => 'logo.' . $request->logo->getClientOriginalExtension(),
                )->disk('public')->prunable(),
            // Text::make('GeneralSettings Field Label', 'general-settings'),
        ];
    }
}
