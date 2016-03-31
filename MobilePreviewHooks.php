<?php

class MobilePreviewHooks {
        public static function onOutputPageBeforeHTML( OutputPage &$out, &$text ) {
		global $wgRequest;
		$wpMobilePreviewWidth = $wgRequest->getInt('wpMobilePreviewWidth');
		
		if((isset($wpMobilePreviewWidth)) && ($wpMobilePreviewWidth != 0) && (strpos($text, 'previewnote'))) {
			$text = '<div class="wiki-bordercolor-light" style="border-width:1px;border-style:solid;padding:10px;max-width:' . $wpMobilePreviewWidth . 'px;width:100%;margin:0px auto;">' . $text . '</div>';
		}
		
                return true;
        }
	
	public static function onEditPageBeforeEditButtons( &$editpage, &$buttons, &$tabindex ) {
		global $wgRequest;
		$wpMobilePreviewWidth = $wgRequest->getInt('wpMobilePreviewWidth');
		$tabindex++;
		$buttons['mobile_preview'] = '<input id="wpMobilePreviewWidth" name="wpMobilePreviewWidth" tabindex="' . $tabindex . '" title="' . wfMessage('previewwidthinpxtitle') . '" value="' . (($wpMobilePreviewWidth != 0)?$wpMobilePreviewWidth:'') . '" placeholder="' . wfMessage('previewwidthinpx') . '" type="text">';
		return true;
	}
}


?>