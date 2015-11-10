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
