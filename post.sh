CATEGORIES=(team page slider)
for CATEGORY in ${CATEGORIES[@]}; do
 for f in $CATEGORY/*;do
	echo "adding $f"
	n="${f/$CATEGORY\//}"
	if [ $CATEGORY == "page" ]; then
		POST_TYPE="--post_type=page"
	else
		POST_TYPE=""
	fi
	x=`wp post create "$f" --post_title="$n" $POST_TYPE  --post_status=publish --porcelain`; 
	echo "id $x"
	i="${f/$CATEGORY/images\/$CATEGORY}"
	if [ -e "$i".jpg ]; then
		echo "pic: $i.jpg"
		type="jpg"
	elif [ -e "$i".png ]; then
		echo "pic: $i.png"
		type="png"
	else
		type=
	fi
	# if image exists
	if [ -z "$type" ]; then
		echo "no pic for $i"
	else
 		wp media import "$i"."$type" --post_id=`echo $x` --featured_image
	fi
	# add category
	wp post term add `echo $x` category $CATEGORY 
	wp post term add `echo $x` post_tag $CATEGORY
 done
done
echo "PL lang -> accessible poetry plugin"
cp src/acp-pl_PL.* ../hospitalpage/wp-content/languages/plugins/
echo "no comments allowed"
wp option set default_comment_status Disallow
echo "flat media structure"
wp option set uploads_use_yearmonth_folders 0
echo "plugin settings"
wp option set acp_toolbar_side	right
wp option set acp_toolbar_icon_pos	middle
wp option set acp_toolbar_icon_size	medium
wp option set acp_keyboard_hide	1
wp option set acp_fontsizer_size	20
wp option set acp_fontsizer_size_min	14
wp option set acp_fontsizer_size_max	48
echo "simple cookie notifi bar"
echo '
{"message":"Na stronie Wojew\u00f3dzkiego Szpitala Zespolonego u\u017cywamy plik\u00f3w COOKIE","ok-label":"Akceptuj","more-info-label":"","more-info-url":"","font-size":20,"text-align":"center","text-color":"#000000","background-color":"#ffffff","border-color":"#dd3333","ok-background-color":"#1e73be","button-border-color":"#dd3333","ok-text-color":"#eeee22","display-shadow":0}
' | wp option set scnb_settings --format=json
TEAM_ID=`wp term list category --name=team --field=term_id`
SLIDER_ID=`wp term list category --name=slider --field=term_id`
O_NAS_ID=`wp post list --post_type=page --fields=ID,post_title | grep "O nas" | awk '{print $1;}'`
echo "Id strony o nas $O_NAS_ID"
echo ;
echo "{\"enable_parallax\":\"1\",\"enable_parallax_nav\":\"1\",\"home_text\":\"Start\",\"enable_animation\":\"1\",\"enable_responsive\":\"1\",\"fav_icon\":\"\",\"header_layout\":\"logo-side\",\"parallax_section\":{\"51\":{\"page\":\"$O_NAS_ID\",\"color\":\"\",\"image\":\"\",\"repeat\":\"no-repeat\",\"position\":\"top left\",\"attachment\":\"scroll\",\"size\":\"auto\",\"font_color\":\"\",\"layout\":\"team_template\",\"category\":\"$TEAM_ID\",\"overlay\":\"overlay0\"}},\"parallax_count\":\"51\",\"post_date\":\"1\",\"post_author\":\"1\",\"post_footer\":\"1\",\"post_pagination\":\"1\",\"show_slider\":\"yes\",\"slider_category\":\"$SLIDER_ID\",\"slider_full_window\":\"yes\",\"slider_overlay\":\"no\",\"show_pager\":\"yes\",\"show_controls\":\"yes\",\"auto_transition\":\"yes\",\"slider_transition\":\"fade\",\"slider_speed\":\"5000\",\"slider_pause\":\"5000\",\"show_caption\":\"yes\",\"show_social\":\"1\",\"facebook\":\"\",\"twitter\":\"\",\"google_plus\":\"\",\"youtube\":\"\",\"pinterest\":\"\",\"linkedin\":\"\",\"flickr\":\"\",\"vimeo\":\"\",\"instagram\":\"\",\"skype\":\"\",\"custom_css\":\"\"}" | wp option set accesspress_parralax --format=json
