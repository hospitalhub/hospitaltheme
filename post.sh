CATEGORIES=(team page slider)
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
