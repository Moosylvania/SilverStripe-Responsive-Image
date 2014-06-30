SilverStripe-Responsive-Image
=============================

Responsive Image module for SilverStripe implementing the bottom-padding technique

## Requirements

 * SilverStripe 3.1.0+

## Installation & Documentation

1. Clone Repository or use Composer to pull this module down to your silverstripe project
2. Any pages that are using the ResponsiveImage DataObject will need to include the following JS CSS on your site -

        Requirements::javascript('SilverStripe/Responsive-Image/javascript/responsive-img.js');
        Requirements::css('SilverStripe/Responsive-Image/css/responsive-img.css');
3. Instead of using the Image Object types on your page, use ResponsiveImage.  ex.

        private static $has_one = array(
            'HeroImage' => 'ResponsiveImage'
        );
4. Inside your Templates, to render the proper output you would then call -

        $HeroImage.Responsive

### Notes:
This Module was written and inspired from the padding-bottom hack that is documented at -

http://www.smashingmagazine.com/2013/09/16/responsive-images-performance-problem-case-study/
